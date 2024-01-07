<?php

namespace Webkul\Shop\Http\Controllers\API;

use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Partner\Repositories\PartnerRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Shop\Http\Resources\AttributeResource;
use Webkul\Shop\Http\Resources\CategoryResource;
use Webkul\Shop\Http\Resources\CategoryTreeResource;
use Webkul\Shop\Http\Resources\PartnerResource;

class PartnerController extends  APIController
{
    public function __construct(
        protected PartnerRepository $partnerRepository
    )
    {

    }
    public function index(): JsonResource
    {
        $defaultParams = [
            'locale' => app()->getLocale(),
        ];

        $partners = $this->partnerRepository->getAll(array_merge($defaultParams, request()->all()));

        return PartnerResource::collection($partners);

    }
}

