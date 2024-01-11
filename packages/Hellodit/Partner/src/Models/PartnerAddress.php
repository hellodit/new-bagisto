<?php

namespace Hellodit\Partner\Models;

use Illuminate\Database\Eloquent\Model;
use Hellodit\Partner\Contracts\PartnerAddress as PartnerAddressContract;

class PartnerAddress extends Model implements PartnerAddressContract
{
    protected $fillable = [];
}