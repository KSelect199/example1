@extends('layouts.main')
@section('content')
    <div>
       
        <h5>Данные по сим картам</h5>
        <table class="table table-dark table-hover">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">imei</th>
                <th scope="col">Номер телефона</th>
                <th scope="col">ФИО</th>
                <th scope="col">Название тарифа</th>
                <th scope="col">кол-минут</th>
                <th scope="col">кол-смс</th>
                <th scope="col">Стоимость/мес</th>
                <th scope="col">Дата регистрации СИМ-карты</th>
                <th scope="col"></th>
              </tr>
            </thead>
                <tbody>
                    @foreach($simCards as $simCard)
                        <tr>
                            <th scope="row">{{$simCard->id}}</th>
                            <td>{{$simCard->imei}}</td>
                            <td>{{$simCard->phone_number}}</td>
                            <td>{{$simCard->fullname}}</td>
                            <td>{{$simCard->tariff_plan->tarif_plan_name}}</td>
                            <td>{{$simCard->tariff_plan->minutes}}</td>
                            <td>{{$simCard->tariff_plan->sms}}</td>
                            <td>{{$simCard->tariff_plan->price}}</td>
                            <td>{{$simCard->created_at}}</td>
                            <td >   
                                <a @style('margin-bottom: 5px') href="{{route('simCard.show', $simCard->id)}}" class="btn btn-outline-primary btn-sm">Посмотреть</a>
                                <a @style('margin-bottom: 5px') href="{{route('simCard.edit', $simCard->id)}}" class="btn btn-outline-warning btn-sm">Изменить</a>
                                <form @style('display: inline-block;') action="{{route('simCard.delete', $simCard->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input @style('margin-bottom: 5px') type="submit" class="btn btn-outline-danger btn-sm" value="Удалить"></input>
                                </form>
                            </td>
                        </tr>        
                    @endforeach
                </tbody>
        </table>  

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Добавить запись
          </button>
          
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Добавление сим карты</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('simCard.store')}}" method="post" class="col g-3">
                        @csrf
                        <div class="col-sm-7">
                          <label for="imei">Номер сим карты IMEI</label>
                          <input value="{{old('imei')}}" type="text" class="form-control" name="imei" id="imei" placeholder="imei">
                          @error('imei')
                            <p class="text-danger">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="col-sm-7">
                          <label for="phone_number">Номер телефона</label>
                          <input value="{{old('phone_number')}}" type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Номер телефона">
                          @error('phone_number')
                            <p class="text-danger">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="col-sm-7">
                          <label for="fullname">ФИО</label>
                          <input value="{{old('fullname')}}" type="text" class="form-control" name="fullname" id="fullname" placeholder="ФИО">
                          @error('fullname')
                            <p class="text-danger">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="col-sm-7">
                          <label for="tarif_plan_name">Название тарифного плана</label>
                          <p>{{old('tarif_plan_name')}}</p>
                          <select class="form-select" name="tariff_plan_id" id="tarif_plan_name">
                            
                            @foreach($tariffPlan as $tarifName)
                            {{old('tariff_plan_id') == $tarifName->id ? 'selected':''}}
                                <option value={{$tarifName->id}}>{{$tarifName->tarif_plan_name}}</option>
                            @endforeach
                          </select>
                        </div>
                        
                        <div class="col-auto" @style("margin-top: 30px")>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                      </form>
                </div>
               
              </div>
            </div>
          </div>
        <div @style('margin-top: 50px;')>
            <h5>Данные по тарифам</h5>
        <table class="table table-dark table-hover">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Название тарифа</th>
                <th scope="col">кол-минут</th>
                <th scope="col">кол-смс</th>
                <th scope="col">Стоимость/мес</th>
             
              </tr>
            </thead>
                <tbody>
                    @foreach($tariffPlan as $tarifName)
                        <tr>                       
                            <td>{{$tarifName->id}}</td>
                            <td>{{$tarifName->tarif_plan_name}}</td>
                            <td>{{$tarifName->minutes}}</td>
                            <td>{{$tarifName->sms}}</td>
                            <td>{{$tarifName->price}}р</td>
                            {{-- <td >   
                                <a @style('margin-bottom: 5px') href="{{route('simCard.show', $simCard->id)}}" class="btn btn-outline-primary btn-sm">Посмотреть</a>
                                <a @style('margin-bottom: 5px') href="{{route('simCard.edit', $simCard->id)}}" class="btn btn-outline-warning btn-sm">Изменить</a>
                                <form @style('display: inline-block;') action="{{route('simCard.delete', $simCard->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input @style('margin-bottom: 5px') type="submit" class="btn btn-outline-danger btn-sm" value="Удалить"></input>
                                </form>
                            </td> --}}
                        </tr>        
                    @endforeach
                </tbody>
        </table> 
        </div> 
    </div>
@endsection