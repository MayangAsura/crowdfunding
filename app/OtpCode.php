<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidTrait;

class OtpCode extends Model
{
    use UuidTrait;

    protected $guarded = [];
}
