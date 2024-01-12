<?php

namespace Webkul\Shop\Http\Controllers\API;

use Hellodit\Partner\Repositories\PartnerRepository;
use Illuminate\Http\Resources\Json\JsonResource;
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

