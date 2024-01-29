<?php

namespace Hellodit\Partner\Models;

use Hellodit\Location\Models\Location;
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
        'location_id',
        'telephone',
        'mobile',
        'email'
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');

    }
}
