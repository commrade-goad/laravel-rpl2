<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distro extends Model
{
    protected $fillable = [
        'name',
        'version',
        'package_manager',
        'home_url'
    ];
}
