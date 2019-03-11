<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class Flight extends Model{
    protected $table = 'flight_list';
    protected $primaryKey = 'fl_id';
    public function searchFlight($from,$to,$departure_date,$landing_date,$fl_fc_id)
    {
    	$flight = DB::table('flight_list')
        ->leftJoin('flight_class', 'flight_list.fl_fc_id', '=', 'flight_class.fc_id')
        ->leftJoin('airlines', 'flight_list.fl_airline_id', '=', 'airlines.airline_id')
        ->where([['fl_city_id_from', '=' , $from],
        ['fl_city_id_to', '=' , $to],
        ['fl_fc_id', '=' , $fl_fc_id],
        /*['fl_departure_date', '>=', $departure],
        ['fl_landing_date', '>=', $landing_date,*/
        ])
        ->get();
        
		return $flight;
    }
    public function getFlight($id)
    {
    	$flight = DB::table('flight_list')
        ->leftJoin('flight_class', 'flight_list.fl_fc_id', '=', 'flight_class.fc_id')
        ->leftJoin('airlines', 'flight_list.fl_airline_id', '=', 'airlines.airline_id')
        ->where([['fl_id', '=' , $id],
        ])
        ->get();
        
		return $flight;
    }
    
}

