<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tariff_plan extends Model
{
    use SoftDeletes;

    protected $table = 'tariff_plans';
    protected $guarded = false;
    public function sim_cards()
    {
        return $this->hasMany(Sim_card::class, 'tariff_plan_id', 'id');
    }
}
