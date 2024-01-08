<?php

namespace Hellodit\CustomerProduct\Http\Controllers\Shop;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;
use Webkul\Admin\Http\Resources\AttributeResource;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Core\Rules\Slug;
use Webkul\Inventory\Repositories\InventorySourceRepository;
use Webkul\Product\Helpers\ProductType;
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
        protected ProductInventoryRepository          $productInventoryRepository
    )
    {
    }

    public function index()
    {
        if (request()->ajax()) {
            return app(ProductDataGrind::class)->toJson();
        }
        return view('customerproduct::shop.default.index');
    }

    public function create()
    {
        return view('customerproduct::shop.default.create');
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
                'redirect_url' => route('shop.customer_product.index', ['id' => $product->id]),
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
        $product = $this->productRepository->findOrFail($id);
        $inventorySources = $this->inventorySourceRepository->findWhere(['status' => self::ACTIVE_STATUS]);

        return view('customerproduct::shop.default.edit', compact('product', 'inventorySources'));

    }

    public function update(Request $request, $id)
    {
        Event::dispatch('catalog.product.update.before', $id);

        $data = request()->all();
        $data['channel'] = null;
        $data['locale'] = null;
        $data['visible_individually'] = true;
        $data['url_key'] = Str::slug($data['name'],'-');

        $product = $this->productRepository->update($data, $id);
        Event::dispatch('catalog.product.update.after', $product);

        session()->flash('success', trans('admin::app.catalog.products.update-success'));
        return redirect()->route('shop.customer_product.index', ['id' => $product->id]);
    }
}
