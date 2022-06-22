<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enlistment extends Model
{
    use HasFactory;

    protected $table = 'enlistments';

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
