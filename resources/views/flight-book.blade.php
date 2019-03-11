@extends('layout.master')
@section('content')
        <main>
            <div class="container">
                <h2>Booking</h2>
                <div class="row">
                    <div class="col-md-8">
                        <form role="form" action="{{route('get-booking-flight')}}" method="post">
                        {{ csrf_field() }}
                           
                            @if(!empty($user))
                            
                            <section>
                                <h3>Contact Information</h3>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                   
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="control-label">
                                                    First Name:
                                                </label>
                                                <input type="text" name =""  value="" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">
                                                    Last Name:
                                                </label>
                                               
                                                <input type="text" name =""  value="{{$user[0]->name}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="control-label">
                                                    Contact's Mobile phone number
                                                </label>
                                                <input type="tel" name =""  value="{{$user[0]->phone}}" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">
                                                    Contact's email address
                                                </label>
                                                <input type="email" name =""  value="{{$user[0]->email}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" class="btn btn-default">Clear all</button>
                                            <button type="button" class="btn btn-default">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </section>                 
                            @else
                            
                            <section>
                                <h3>Contact Information</h3>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="control-label">
                                                    First Name:
                                                </label>
                                                <input type="text" name ="" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">
                                                    Last Name:
                                                </label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="control-label">
                                                    Contact's Mobile phone number
                                                </label>
                                                <input type="tel" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">
                                                    Contact's email address
                                                </label>
                                                <input type="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" class="btn btn-default">Clear all</button>
                                            <button type="button" class="btn btn-default">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            @endif
                            <section>
                                <h3>Passenger(s) Details</h3>
                                @for($i = 0 ; $i <  $person ; $i++)
                                
                                    <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h4>Passenger #{{$i+1}}</h4>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <label class="control-label">Title:</label>
                                                <select class="form-control" name='passenger[{{$i}}][title]'>
                                                    <option value="mr">Mr.</option>
                                                    <option value="mrs">Mrs.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="control-label">First Name:</label>
                                                <input type="text" name='passenger[{{$i}}][first_name]' class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">Last Name:</label>
                                                <input type="text" name='passenger[{{$i}}][last_name]' class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                @endfor
                                
                                
                            </section>
                            <section>
                                <h3>Price Details</h3>
                                <div>
                                    <h5>
                                        <strong class="airline">{{$flight[0]->airline_name}}</strong>
                                        <p><span class="flight-class">{{$flight[0]->fc_name}}</span></p>
                                    </h5>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <div class="pull-left">
                                                <strong>Passengers Fare (x{{$person}})</strong>
                                            </div>
                                            <div class="pull-right">
                                                <strong>{{$sum_price}}</strong>
                                            </div>
                                            <div class="clearfix"></div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="pull-left">
                                                <span>Tax</span>
                                            </div>
                                            <div class="pull-right">
                                                <span>Included</span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </li>
                                        <li class="list-group-item list-group-item-info">
                                            <div class="pull-left">
                                                <strong>You Pay</strong>
                                            </div>
                                            <div class="pull-right">
                                                <strong>{{$sum_price}}</strong>
                                            </div>
                                            <div class="clearfix"></div>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            <section>
                                <h3>Payment</h3>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Payment Method:
                                            </label>
                                            <select class="form-control" name="payment">
                                                <option value="transfer">Transfer</option>
                                                <option value="credit_card">Credit Card</option>
                                                <option value="paypal">Paypal</option>
                                            </select>
                                        </div>
                                        <h4>Credit Card</h4>
                                        <div class="form-group">
                                            <label class="control-label">Card Number</label>
                                            <input type="number" name="card_number" class="form-control" placeholder="Digit card number">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <label class="control-label">Name on card:</label>
                                                <input type="text" name ="name_card" class="form-control">
                                            </div>
                                            <div class="col-sm-2">
                                                <label class="control-label">CCV Code:</label>
                                                <input type="number" name="ccv_code" maxlength="3" class="form-control" placeholder="Digit CCV">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                                <input type="hidden" name ="flight_price" value="{{$sum_price}}" class="form-control">
                                <input type="hidden" name ="flight_id" value="{{$flight[0]->fl_id}}" class="form-control">
                                <input type="hidden" name="fl_departure_date" class="form-control" value="{{$flight[0]->fl_departure_date}}" class="form-control">
                                <input type="hidden" name="fl_landing_date" class="form-control" value="{{$flight[0]->fl_landing_date}}" class="form-control">
                                <input type="hidden" name="fl_city_id_from" class="form-control" value="{{$flight[0]->fl_city_id_from}}" class="form-control">
                                <input type="hidden" name="fl_city_id_to" class="form-control" value="{{$flight[0]->fl_city_id_to}}" class="form-control">
                                <input type="hidden" name="fl_fc_id" class="form-control" value="{{$flight[0]->fl_fc_id}}" class="form-control">
                            <section>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">
                                        Continue to Booking
                                    </button>
                                </div>
                            </section>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <h3>Flights</h3>
                        <aside>
                            <article>
                                <div>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <h5>
                                                <strong class="airline">Qatar Airways QR-957</strong>
                                                <p><span class="flight-class">Economy</span></p>
                                            </h5>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div><big class="time">18:45</big></div>
                                                            <div><small class="date">29 Apr 2017</small></div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div><span class="place">Jakarta (CGK)</span></div>
                                                            <div><small class="airport">Soekarno Hatta Intl Airport</small></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 text-center">
                                                    <i class="glyphicon glyphicon-arrow-down"></i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div><big class="time">23:20</big></div>
                                                            <div><small class="date">29 Apr 2017</small></div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div><span class="place">Doha (DOH)</span></div>
                                                            <div><small class="airport">Doha Hamad International
                                                                    Airport</small></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-warning">
                                            <ul>
                                                <li>Transit for 1h 30m in Doha (DOH)</li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item">
                                            <h5>
                                                <strong class="airline">Qatar Airways QR-1052</strong>
                                                <p><span class="flight-class">Economy</span></p>
                                            </h5>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div><big class="time">00:50</big></div>
                                                            <div><small class="date">30 Apr 2017</small></div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div><span class="place">Doha (DOH)</span></div>
                                                            <div><small class="airport">Doha Hamad International
                                                                    Airport</small></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 text-center">
                                                    <i class="glyphicon glyphicon-arrow-down"></i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div><big class="time">02:55</big></div>
                                                            <div><small class="date">30 Apr 2017</small></div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div><span class="place">Abu Dhabi (AUH)</span></div>
                                                            <div><small class="airport">Abu Dhabi Intl</small></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </aside>
                    </div>
                </div>
            </div>
            <br>
        </main>
@endsection