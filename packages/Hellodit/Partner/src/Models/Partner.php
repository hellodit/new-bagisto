<?php

namespace Hellodit\Partner\Models;

use Illuminate\Database\Eloquent\Model;
use Hellodit\Partner\Contracts\Partner as PartnerContract;

class Partner extends Model implements PartnerContract
{
    protected $fillable = [
        'language',
        'solution',
        'title',
        'last_name',
        'first_name',
        'street',
        'zip_code',
        'city',
        'country',
        'state',
        'telephone',
        'mobile',
        'famille',
        'email',
        'website',
        'company',
        'company_id',
        'image',
        'description',
    ];



    public function setImageAttribute($value)
    {
        $attributeName = "image";
        $folderPath = "partner-image";
        if ($value) {
            $value = $value[0];
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
    public function address()
    {
        return $this->hasMany(PartnerAddress::class,'partner_id');
    }
}
