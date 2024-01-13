<?php

namespace Hellodit\CustomerProduct\Http\Controllers\Resource;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CustomerProductResource  extends JsonResource
{
    public function toArray($request)
    {
        return [
            'link' => route('shop.customer_product.information', ['user_id' => $this->id]),
            'id' => $this->id,
            'name' => $this->first_name." ".$this->last_name,
            'image' => Storage::url($this->image),
        ];
    }

}
