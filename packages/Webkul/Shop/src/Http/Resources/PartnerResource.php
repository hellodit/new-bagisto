<?php

namespace Webkul\Shop\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartnerResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'link' => route('shop.partner.detail', ['id' => $this->id]),
            'id' => $this->id,
            'company' => $this->company,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'image' => $this->imageAssets(),
        ];
    }
}
