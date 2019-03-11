@extends('layout.master')
@section('content')

<main>
        <div class="container">
           
        <section>
                <h2>@foreach ($citys as $city )
                    @if ($city->city_id == $_GET['from'])
                        {{$city->city_name}} - ({{$city->city_code}})
                    @endif
                @endforeach
                <i class="glyphicon glyphicon-arrow-right"></i> 
                @foreach ($citys as $city )
                @if ($city->city_id == $_GET['to'])
                    {{$city->city_name}} - ({{$city->city_code}})
                @endif
                @endforeach</h2>
                @foreach ($fli_list as $flight )
                <article>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><strong><a href="flight-detail.html"></a></strong></h4>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label class="control-label">From:</label>
                                            <div><big class="time">{{date('H:i', $flight->fl_departure_date)}}</big></div>
                                            @foreach ($citys as $city )
                                                @if ($city->city_id == $_GET['from'])
                                                <div><span class="place">{{$city->city_name}} </span></div>
                                                    
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="control-label">To:</label>
                                            <div><big class="time">{{date('H:i', $flight->fl_landing_date)}}</big></div>
                                            @foreach ($citys as $city )
                                                @if ($city->city_id == $_GET['to'])
                                                <div><span class="place">{{$city->city_name}} </span></div>
                                                    
                                                @endif
                                            @endforeach
                                            
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="control-label">Duration:</label>
                                            <div><big class="time">{{date('H:i', $flight->fl_landing_date - $flight->fl_departure_date) }}</big></div>
                                            <div><strong class="text-danger"></strong></div>
                                        </div>
                                        <div class="col-sm-3 text-right">
                                            <h3 class="price text-danger"><strong>{{number_format($flight->fl_cost)}}</strong></h3>
                                            <div>
                                                <form role="form" action="{{route('detail-flight')}}" method="get">
                                                    <input type="hidden" name="id" class="form-control" value="{{$flight->fl_id}}">
                                                    <input type="hidden" name="person" class="form-control" value="{{$_GET['person']}}">
                                                    <button type="submit" class="btn btn-link">See Detail</button>    
                                                </form>
                                                <form role="form" action="{{route('booking-flight')}}" method="post">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="id" class="form-control" value="{{$flight->fl_id}}">
                                                    <input type="hidden" name="person" class="form-control" value="{{$_GET['person']}}">
                                                    <input type="hidden" name="price" class="form-control" value="{{($flight->fl_cost * $_GET['person'])}}">
                                                    <button type="submit" class="btn btn-primary">Choose</button>    
                                            </form>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach
                <div class="text-center">
                    <ul class="pagination">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">&lsaquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">&rsaquo;</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </section>
        </div>
    </main>

    
@endsection
   
    