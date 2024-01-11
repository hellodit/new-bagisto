<?php

namespace Hellodit\Partner\Models;

use Illuminate\Database\Eloquent\Model;
use Hellodit\Partner\Contracts\Partner as PartnerContract;

class Partner extends Model implements PartnerContract
{
    protected $fillable = [];
}