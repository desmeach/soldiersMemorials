<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soldier extends Model
{
    use HasFactory;

    protected $table = 'soldiers';

    public function birthplace()
    {
        return $this->hasOne(Birthplace::class, 'id', 'birthplace_id');
    }

    public function enlistment()
    {
        return $this->hasOne(Enlistment::class, 'id', 'enlistment_id');
    }

    public function militaryUnit()
    {
        return $this->hasOne(MilitaryUnit::class, 'id', 'military_unit_id');
    }

    public function rank()
    {
        return $this->hasOne(Rank::class, 'id', 'rank_id');
    }

    public function retire()
    {
        return $this->hasOne(Retire::class, 'id', 'retire_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function soldierAwards()
    {
        return $this->hasMany(SoldierAward::class, 'soldier_id');
    }
}
