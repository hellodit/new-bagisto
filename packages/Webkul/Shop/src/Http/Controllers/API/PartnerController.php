<?php

namespace Webkul\Shop\Http\Controllers\API;

use Hellodit\Partner\Models\Partner;
use Hellodit\Partner\Repositories\PartnerRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\Shop\Http\Resources\PartnerResource;

class PartnerController extends APIController
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

    public function recommendation(Request $request)
    {
        $location_id = $request->get('location_id');

        $partners = Partner::whereHas('address', function ($address) use ($location_id) {
            $address->where('location_id', $location_id);
        })->get();

        return PartnerResource::collection($partners);

    }
}

