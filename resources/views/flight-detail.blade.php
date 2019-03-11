@extends('layout.master')
@section('content')
    <main>
        <div class="container">
            <section>
            <h2>
                @foreach ($citys as $city )
                    @if ($city->city_id == $flight[0]->fl_city_id_from)
                        {{$city->city_name}} - ({{$city->city_code}})
                    @endif
                @endforeach
                <i class="glyphicon glyphicon-arrow-right"></i> 
                @foreach ($citys as $city )
                @if ($city->city_id == $flight[0]->fl_city_id_to)
                    {{$city->city_name}} - ({{$city->city_code}})
                @endif
                @endforeach</h2>
                <article>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><strong>{{$flight[0]->airline_name}}</strong></h4>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label class="control-label">From:</label>
                                            <div><big class="time">{{date('H:i', $flight[0]->fl_departure_date)}}</big></div>
                                            @foreach ($citys as $city )
                                                @if ($city->city_id == $flight[0]->fl_city_id_from)
                                                <div><span class="place">{{$city->city_name}} </span></div>
                                                    
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="control-label">To:</label>
                                            <div><big class="time">{{date('H:i',$flight[0]->fl_landing_date)}}</big></div>
                                            @foreach ($citys as $city )
                                                @if ($city->city_id == $flight[0]->fl_city_id_to)
                                                <div><span class="place">{{$city->city_name}} </span></div>
                                                    
                                                @endif
                                            @endforeach
                                            
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="control-label">Duration:</label>
                                            <div><big class="time">{{date('H:i', $flight[0]->fl_landing_date - $flight[0]->fl_departure_date) }}</big></div>
                                            <div><strong class="text-danger"></strong></div>
                                        </div>
                                        <div class="col-sm-3 text-right">
                                            <h3 class="price text-danger"><strong>{{number_format($flight[0]->fl_cost)}}</strong></h3>
                                            <div>
                                               
                                            <form role="form" action="{{route('booking-flight')}}" method="post">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="id" class="form-control" value="{{$flight[0]->fl_id}}">
                                                    <input type="hidden" name="person" class="form-control" value="{{$_GET['person']}}">
                                                    <input type="hidden" name="price" class="form-control" value="{{$sum_price}}">
                                                    <button type="submit" class="btn btn-primary">Choose</button>    
                                            </form>   
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#flight-detail-tab">Flight Details</a></li>
                                        <li><a data-toggle="tab" href="#flight-price-tab">Price Details</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="flight-detail-tab" class="tab-pane fade in active">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <h5>
                                                        <strong class="airline">Qatar Airways QR-957</strong>
                                                        <p><span class="flight-class">Economy</span></p>
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-sm-4">
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
                                                        <div class="col-sm-1">
                                                            <i class="glyphicon glyphicon-arrow-right"></i>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div><big class="time">23:20</big></div>
                                                                    <div><small class="date">29 Apr 2017</small></div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div><span class="place">Doha (DOH)</span></div>
                                                                    <div><small class="airport">Doha Hamad International Airport</small></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 text-right">
                                                            <label class="control-label">Duration:</label>
                                                            <div><strong class="time">7h 35m</strong></div>
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
                                                        <div class="col-sm-4">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div><big class="time">00:50</big></div>
                                                                    <div><small class="date">30 Apr 2017</small></div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div><span class="place">Doha (DOH)</span></div>
                                                                    <div><small class="airport">Doha Hamad International Airport</small></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <i class="glyphicon glyphicon-arrow-right"></i>
                                                        </div>
                                                        <div class="col-sm-4">
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
                                                        <div class="col-sm-3 text-right">
                                                            <label class="control-label">Duration:</label>
                                                            <div><strong class="time">2h 5m</strong></div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div id="flight-price-tab" class="tab-pane fade">
                                            <h5>
                                                <strong class="airline">{{$flight[0]->airline_name}}</strong>
                                                <p><span class="flight-class">{{$flight[0]->fc_name}}</span></p>
                                            </h5>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <div class="pull-left">
                                                        <strong>Passengers Fare (x{{$_GET['person']}})</strong>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </section>
        </div>
    </main>
@endsection