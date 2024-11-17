@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('simCard.store')}}" method="post" class="row gx-3 gy-2 align-items-center">
            @csrf
            <div class="col-sm-3">
              <label class="visually-hidden" for="imei">imei</label>
              <input type="text" class="form-control" name="imei" id="imei" placeholder="imei">
            </div>
            <div class="col-sm-3">
              <label class="visually-hidden" for="phone_number">phone_number</label>
              <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Номер телефона">
            </div>
            <div class="col-sm-3">
              <label class="visually-hidden" for="fullname">fullname</label>
              <input type="text" class="form-control" name="fullname" id="fullname" placeholder="ФИО">
            </div>
            <div class="col-sm-3">
              <label class="visually-hidden" for="tarif_plan_name">tarif_plan_name</label>
              <select class="form-select" name="tariff_plan_id" id="tarif_plan_name">
                <option selected>Выберите тарифный план</option>
                @foreach($tariffPlan as $tarifName)
                    <option value={{$tarifName->id}}>{{$tarifName->tarif_plan_name}}</option>
                @endforeach
              </select>
            </div>
            
            <div class="col-auto">
              <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
          </form>
    </div>
@endsection