<?php

namespace Hellodit\Location\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'link' => route('shop.location.detail', ['slug' => $this->slug]),
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->imageAssets(),
        ];
    }
}
