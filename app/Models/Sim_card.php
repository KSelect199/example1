<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sim_card extends Model
{
    use SoftDeletes;

    protected $table = 'sim_cards';
    protected $guarded = false;

    public function tariff_plan()
    {
        return $this->belongsTo(Tariff_plan::class, 'tariff_plan_id', 'id');
    }
}
