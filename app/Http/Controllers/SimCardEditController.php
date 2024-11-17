<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sim_card;
use App\Models\Tariff_plan;

class SimCardEditController extends Controller
{
    public function index() {
        $tariffPlan = Tariff_plan::all();
        $simCards = Sim_card::all();
        return view('simCard.index', compact('simCards','tariffPlan'));
    }

    public function create() {
        $tariffPlan = Tariff_plan::all();
        dump($tariffPlan);
        return view('simCard.create', compact('tariffPlan'));
    }

    public function store() {
        $data = request()->validate([
            'imei'=>'integer',
            'phone_number'=>'integer',
            'fullname'=>'string',
            'tariff_plan_id'=>'integer',
        ]);
        Sim_card::create($data);
        return redirect()->route('simCard.index');
    }

    public function show(Sim_card $simCard) {
        $tariffPlan = Tariff_plan::all();
        return view('simCard.show',compact('simCard', 'tariffPlan'));
    }

    public function edit(Sim_card $simCard) {
        $tariffPlan = Tariff_plan::all();
        return view('simCard.edit',compact('simCard', 'tariffPlan'));
    }

    public function update(Sim_card $simCard) {
        $data = request()->validate([
            'imei'=>'required|integer',
            'phone_number'=>'required|integer',
            'fullname'=>'required|string',
            'tariff_plan_id'=>'integer',
        ]);
        $simCard->update($data);
        return redirect()->route('simCard.show', $simCard->id);
    }

    public function destroy(Sim_card $simCard) {
        $simCard->delete();
        return redirect()->route('simCard.index');
    }

    // public function delete() {
    //     Поиск удаленных
    //     $simCard = Sim_card::withTrashed()->find(1);
    //     Восстановление удаленного 
    //     $simCard->restore();
    //     $simCard = Sim_card::find(1);
    //     $simCard->delete();
    //     dd('deleted');
    // }

    // public function firstOrCreate() {
   
    //     $anotherSimCard = [
    //         'imei' => 111111,
    //         'phone_number' => '+79751242612',
    //         'fullname' => 'Апсевдокевич Смирнов Андрей',
    //         'registration_date' => '26.11.2010',
    //         'tariff_plan_id' => 2,     
    //     ];
    //     $simCard = Sim_card::firstOrCreate(['imei' => $anotherSimCard['imei']], $anotherSimCard);
    //     dump($simCard->fullname);
    //     dd('finished');
    // }

    // public function updateOrCreate() {
   
    //     $anotherSimCard = [
    //         'imei' => 111111,
    //         'phone_number' => '+79751242612',
    //         'fullname' => 'Апсевдокевич Смирнов Андрей',
    //         'registration_date' => '26.11.2010',
    //         'tariff_plan_id' => 2,     
    //     ];
    //     $simCard = Sim_card::updateOrCreate(['imei' => $anotherSimCard['imei']], $anotherSimCard);
    //     dump($simCard->fullname);
    //     dd('finished');
    // }
}
