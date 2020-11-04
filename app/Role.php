<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidTrait;

class Role extends Model
{
    use UuidTrait;

    protected $guarded = [];
}
