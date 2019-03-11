<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Models\Flight;
class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $ct_list =DB::table('cities')->get();
        $flight_class =DB::table('flight_class')->get();

        return view('index', compact('ct_list','flight_class'));
    }
    public function searchFlight(Request $request)
    {
       
       if($request->to==$request->from || $request->departure == null ){
            return redirect()->route('index') ;
        };
        $date_departure = strtotime($request->departure);
        $date_return = strtotime($request->return);
        $citys =DB::table('cities')->get(); 
        $flight = new Flight();
        $fli_list = $flight->searchFlight($request->from,$request->to,$date_departure,$date_return,$request->flight_class);
        return view('flight-list',compact('citys' ,'fli_list'));
    }
    
    public function getDetail(Request $request)
    {
        $flights = new Flight();
        $flight = $flights->getFlight($request->id);
        $price = $flight[0]->fl_cost * $request->person;
        $sum_price = number_format($price);
        //dd($flight);
        $citys =DB::table('cities')->get(); 
        return view('flight-detail',compact('citys' ,'flight','sum_price'));
    }


    public function viewBookingFlight(Request $request)
    {
        //d($request->all());
        $person = intval($request->input('person'));
        $sum_price=$request->input('price');
        $flights = new Flight();
        $flight = $flights->getFlight($request->input('id'));
        if (Auth::check())
        {
            $users_id = Auth::user()->id;
            $user = DB::table('users')->where('id','=', $users_id)->get();
            return view('flight-book', compact('person','sum_price','flight','user'));
            
        }; 
       return view('flight-book', compact('person','sum_price','flight','user'));
    }
    public function getBookingFlight(Request $request)
    {
        //dd( $request->all());
        $flight_id = $request->input('flight_id');
        $passengers =  $request->input('passenger');
        
        if (Auth::check())
        {
        
            $user_id = Auth::user()->id;
            for( $i = 0 ; $i< count ($passengers) ; $i++){
                
                DB::table('passengers')->insert([
                    [
                    'passenger_title' => $passengers[$i]["title"], 
                    'passenger_first_name' =>  $passengers[$i]["first_name"],
                    'passenger_last_name'=> $passengers[$i]["last_name"],
                    'passenger_user_id'=> $user_id,
                    'passenger_fl_id' => $flight_id
                    ]
                ]);          
            };
            DB::table('flight_booking')->insert([
                [
                'fb_city_id_from' => $request->input('fl_city_id_from'), 
                'fb_city_id_to' => $request->input('fl_city_id_to'),
                'fb_departure_date'=> intval($request->input('fl_departure_date')),
                'fb_type'=> $request->input('fl_city_id_from'),
                'fb_return_date'=> intval($request->input('fb_departure_date')),
                'fb_transfer'=>"",
                'fb_user_id'=> $user_id,
                'fb_fl_id'=> $flight_id,
                'fb_paypal'=> $request->input('payment'),
                'fb_credit_card'=> $request->input('card_number'),
                'fb_credit_name'=> $request->input('name_card'),
                'fb_total_cost'=> floatval($request->input('flight_price')),
                'fb_ccv_code' => $request->input('ccv_code')
                ]
            ]);    
           
            return redirect()->route('index')->with('message', 'Bạn đã đặt thành công!');;
            
        }; 
        return redirect()->route('login-get');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
