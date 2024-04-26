<?php

namespace Hellodit\CustomerProduct\Http\Controllers\Shop;

use Hellodit\CustomerProduct\Http\Controllers\Resource\CustomerProductResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;
use Webkul\Admin\Http\Resources\AttributeResource;
use Webkul\Admin\Http\Resources\CategoryTreeResource;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Category\Models\Category;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Core\Repositories\ChannelRepository;
use Webkul\Core\Rules\Slug;
use Webkul\Customer\Models\Customer;
use Webkul\Inventory\Repositories\InventorySourceRepository;
use Webkul\Product\Helpers\ProductType;
use Webkul\Product\Models\Product;
use Webkul\Product\Models\ProductFlat;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Webkul\Product\Repositories\ProductDownloadableLinkRepository;
use Webkul\Product\Repositories\ProductDownloadableSampleRepository;
use Webkul\Product\Repositories\ProductInventoryRepository;
use Webkul\Product\Repositories\ProductRepository;
use Hellodit\CustomerProduct\DataGrinds\OrderDataGrid;
use Hellodit\CustomerProduct\DataGrinds\ProductDataGrind;
use Webkul\Shop\Http\Controllers\Controller;

class CustomerProductController extends Controller
{
    const ACTIVE_STATUS = 1;

    public function __construct(
        protected AttributeFamilyRepository           $attributeFamilyRepository,
        protected InventorySourceRepository           $inventorySourceRepository,
        protected ProductRepository                   $productRepository,
        protected ProductAttributeValueRepository     $productAttributeValueRepository,
        protected ProductDownloadableLinkRepository   $productDownloadableLinkRepository,
        protected ProductDownloadableSampleRepository $productDownloadableSampleRepository,
        protected ProductInventoryRepository          $productInventoryRepository,
        protected CategoryRepository                  $categoryRepository,

    )
    {
    }

    public function index()
    {
        if (request()->ajax()) {
            return app(ProductDataGrind::class)->toJson();
        }
        $families = $this->attributeFamilyRepository->all();

        return view('customerproduct::shop.default.index', compact('families'));
    }

    public function create()
    {
        $families = $this->attributeFamilyRepository->all();
        return view('customerproduct::shop.default.create', compact('families'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'type' => 'required',
            'attribute_family_id' => 'required',
            'sku' => ['required', 'unique:products,sku', new Slug],
            'super_attributes' => 'array|min:1',
            'super_attributes.*' => 'array|min:1',
        ]);

        if (
            ProductType::hasVariants(request()->input('type'))
            && !request()->has('super_attributes')
        ) {
            $configurableFamily = $this->attributeFamilyRepository
                ->find(request()->input('attribute_family_id'));

            return new JsonResponse([
                'data' => [
                    'attributes' => AttributeResource::collection($configurableFamily->configurable_attributes),
                ]
            ]);
        }

        Event::dispatch('catalog.product.create.before');

        $data = request()->only([
            'type',
            'attribute_family_id',
            'sku',
            'super_attributes',
            'family',
            'location_id'
        ]);

        $data['customer_id'] = \Auth::user()->id;


        $product = $this->productRepository->create($data);
        Event::dispatch('catalog.product.create.after', $product);
        session()->flash('success', trans('admin::app.catalog.products.create-success'));
        return new JsonResponse([
            'data' => [
                'status' => 'success',
                'redirect_url' => route('shop.customer_product.edit', ['id' => $product->id]),
            ]
        ]);
    }

    public function view()
    {

    }

    public function delete($id)
    {

    }

    public function edit($id)
    {
        $categories = \DB::table('categories')
            ->leftJoin('category_translations', 'category_translations.category_id', '=', 'categories.id')
            ->where('locale_id', '=', core()->getCurrentChannel()->root_category_id)
            ->where('status', 1)->get();


//        $categories = $this->categoryRepository->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id);

//        $categories = Catgeories
        $product = $this->productRepository->findOrFail($id);
        $inventorySources = $this->inventorySourceRepository->findWhere(['status' => self::ACTIVE_STATUS]);

        return view('customerproduct::shop.default.edit', compact('product', 'inventorySources', 'categories'));

    }

    public function update(Request $request, $id)
    {
        Event::dispatch('catalog.product.update.before', $id);
        $data = request()->all();
        $data['channel'] = core()->getCurrentChannel()->code;
        $data['locale'] = core()->getCurrentLocale()->code;


        $data['price'] = Str::replace('.','', $data['price']);
        $data['visible_individually'] = true;
        $data['url_key'] = Str::slug($data['name'], '-').'-'.uniqid();
        if (empty($data['meta_title'])){
            $data['meta_title'] = $data['name'];
        }

        if (empty($data['meta_keywords'])){
            $data['meta_keywords'] = $data['name'];
        }

        if (empty($data['meta_description'])){
            $data['meta_description'] = $data['name'];
        }

        $product = $this->productRepository->update($data, $id);
        Event::dispatch('catalog.product.update.after', $product);

        session()->flash('success', trans('admin::app.catalog.products.update-success'));
        return redirect()->route('shop.customer_product.index', ['id' => $product->id]);
    }

    public function tree()
    {
        $data = $this->categoryRepository->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id);
        return CategoryTreeResource::collection($data);
    }

    public function customerProduct()
    {
        $customers = Customer::whereHas('products')->orderBy('created_at')->limit(5)->get();
        return CustomerProductResource::collection($customers);
    }


    public function UserProducts()
    {
        $customers = Customer::whereHas('products')->orderBy('created_at')->get();
        return view("customerproduct::shop.default.customers", compact('customers'));
    }


    public function information($user_id)
    {
        $author = Customer::whereId($user_id)->with('products')->firstOrFail();
        return view("customerproduct::shop.default.information", compact('author'));
    }
}
