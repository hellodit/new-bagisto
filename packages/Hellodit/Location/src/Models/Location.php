<?php

namespace Hellodit\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Hellodit\Location\Contracts\Location as LocationContract;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Webkul\Product\Models\Product;

class Location extends Model implements LocationContract
{
    protected $fillable = ['name','slug','description', 'status','image'];



    public function setImageAttribute($value)
    {
        $attributeName = "image";
        $folderPath = "partner-image";
        if ($value) {
            $imageName = time() . '_' . $value->getClientOriginalName();
            $value->storeAs($folderPath, $imageName, 'public');
            $this->attributes[$attributeName] = $imageName;
        }
    }


    public function imageAssets()
    {
        $value =  $this->attributes['image'];
        if ($value){
            return asset("storage/partner-image/{$value}");
        }

        return  "https://placehold.co/400";
    }



    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
