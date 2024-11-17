@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('simCard.store')}}" method="post" class="col g-3">
            @csrf
            <fieldset disabled>
            <div class="col-sm-7">
              <label for="imei">Номер сим карты IMEI</label>
              <input type="text" value="{{$simCard->imei}}" class="form-control" name="imei" id="imei" placeholder="imei">
            </div>
            <div class="col-sm-7">
              <label for="phone_number">Номер телефона</label>
              <input type="text" value="{{$simCard->phone_number}}" class="form-control" name="phone_number" id="phone_number" placeholder="Номер телефона">
            </div>
            <div class="col-sm-7">
              <label for="fullname">ФИО</label>
              <input type="text" value="{{$simCard->fullname}}" class="form-control" name="fullname" id="fullname" placeholder="ФИО">
            </div>
            <div class="col-sm-7">
              <label for="tarif_plan_name">Название тарифного плана</label>
              <select class="form-select" name="tariff_plan_id" id="tarif_plan_name">
                @foreach($tariffPlan as $tarifName)
                    <option {{$simCard->tariff_plan->id === $tarifName->id ? 'selected':''}}
                      value="{{$tarifName->id}}">{{$tarifName->tarif_plan_name}}</option>
                @endforeach
              </select>
            </div>
          </fieldset>
            <div class="col-auto" @style("margin-top: 30px")>
                <a href="{{route('simCard.index')}}" class="btn btn-secondary">Вернуться на главную</a>
                <a href="{{route('simCard.edit', $simCard->id)}}"  class="btn btn-primary">Редактировать</a>
            </div>
          </form>
    </div>

@endsection