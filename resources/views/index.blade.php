@extends('layout.master')
@section('content')
<main>

        <div class="container">
            <section>
                <h3>Flight Booking</h3>
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <form role="form" action="{{route('flight-list')}}" method="get">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4 class="form-heading">1. Flight Destination</h4>
                                    <div class="form-group">
                                        <label class="control-label">From: </label>
										<select class="form-control" name="from" id="from"  >
                                            @foreach($ct_list as $pro)
											<option value="{{$pro->city_id}}">{{$pro->city_name}}</option>
											
                                            @endforeach
										</select>                                       
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">To: </label>
                                        <select class="form-control " name="to" id="to"  >
                                            @foreach($ct_list as $pro)
											<option value="{{$pro->city_id}}">{{$pro->city_name}}</option>
											
                                            @endforeach
										</select>       
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <?php $date_now = date('Y-m-d')?>
                                    <h4 class="form-heading">2. Date of Flight</h4>
                                    <div class="form-group">
                                        <label class="control-label">Departure: </label>
                                        <input type="date" name="departure"  id="departure-date" class="form-control  " value="{{  $date_now }}" placeholder="Choose Departure Date">
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="radio">
                                            <label><input type="radio" name="flight_type" checked value="one-way" id="rd_oneway">One Way</label>
                                            <label><input type="radio" name="flight_type" value="return" id="rd_return">Return</label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group" id="return_fl">
                                        <label class="control-label">Return: </label>
                                        <input type="date" name="return" id="return_date" class="form-control " value="{{ $date_now}}" placeholder="Choose Return Date">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <h4 class="form-heading">3. Search Flights</h4>
                                    <div class="form-group">
                                        <label class="control-label">Total Person: </label>
                                        <select class="form-control" name="person" id="total-person">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Flight Class: </label>
                                        <select class="form-control" name="flight_class" id="flight-class">
                                            @foreach($flight_class as $flc)
											<option value="{{$flc->fc_id}}">{{$flc->fc_name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id ="btn-search"class="btn btn-primary btn-block">Search Flights</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
    
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('/assets/js/index.js') }}"></script>
@endsection
   
    