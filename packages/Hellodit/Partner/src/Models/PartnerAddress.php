<?php

namespace Hellodit\Partner\Models;

use Illuminate\Database\Eloquent\Model;
use Hellodit\Partner\Contracts\PartnerAddress as PartnerAddressContract;

class PartnerAddress extends Model implements PartnerAddressContract
{
    protected $fillable = [
        'partner_id',
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
        'location_id'
    ];
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
