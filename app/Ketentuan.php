<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ketentuan extends Model
{
    protected $table = 'ketentuan';

    // protected $guard = 'id';
    protected $fillable = [
        'qualifier', 'code', 'localizedName', 'flagAttr1'
    ];
}
