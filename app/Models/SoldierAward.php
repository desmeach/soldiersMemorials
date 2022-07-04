<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldierAward extends Model
{
    use HasFactory;

    protected $table = 'soldier_awards';

    public function props()
    {
        return $this->hasOne(Award::class, 'id', 'award_id');
    }
}
