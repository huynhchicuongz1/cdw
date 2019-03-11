<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(){

        return view('register');
    }
    public function postRegister(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'tel' => 'required',
            'password' => 'required|min:5',
            'name' => 'required',
        ],
        [
            // 'email.required'=>'email sai'
        ]);
        if($validator->fails()){
            // dd($validator->errors());
            return redirect()->route('register')->withErrors($validator);
        }
        else{
            DB::table('users')->insert([
                'email'=>$request->email,
                'phone'=>$request->tel,
                'password'=>bcrypt($request->password),
                'name'=>$request->name,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
            return redirect()->route('register')->with('success','Đăng ký thành công');
        }

    }
    public function getLogin(){

        if(Auth::check()){
            return redirect()->route('index');
        }

        return view('login');
    }
    
    public function login_post(Request $request){
        $present_time  =  date('Y-m-d H:i:s');
        
        //echo date('Y-m-d H:i:s', strtotime("+30 minute"));
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required',
        ],[]);
        if($validator->fails()){
            return redirect()->route('login-get')->withErrors($validator);
        }
        $credentials = $request->only('email','password');
        $user_attempt = DB::table('users')->where('email',$request->email)->first();
        if($present_time >= $user_attempt->last_access  ){
            
            if (Auth::attempt($credentials)) {

                DB::table('users')
                    ->where('email',$request->email)
                    ->update([
                        'attempt' => 0,
                        'active'=>1
                    ]);
                return redirect()->route('index');
            } else {
                if($user_attempt->active == 0){
                    DB::table('users')
                    ->where('email',$request->email)
                    ->update([
                        'last_access'=>date('Y-m-d H:i:s', strtotime("+ 30 minute"))
                    ]);
                    return redirect()->route('login-get')->withErrors(['locked_msg'=>'Tài khoản đã bị khóa, vui lòng thử lại sau!']);
                
                }
                if($user_attempt){
                    DB::table('users')
                    ->where('email',$request->email)
                    ->update([
                        'last_access'=>date('Y-m-d H:i:s'),
                        'attempt' => $user_attempt->attempt+1
                    ]);
                    if($user_attempt->attempt+1 >= 3){
                        DB::table('users')
                        ->where('email',$request->email)
                        ->update([
                            'active'=>0,
                        ]);
                    }
                    return redirect()->route('login-get')->with('fail_msg','Sai tài khoản hoặc mật khẩu');
                }
               
            }
        }
        
        return redirect()->route('login-get')->with('fail_msg','Tài khoản đã bị khóa, vui lòng thử lại sau 30 phút!');
         
        
      
        
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }

    public function edit_profile(){
        $user = Auth::user();
        return view('edit_profile',compact('user'));
    }
    public function edit_profile_post(Request $request){
        
        if($request->password != null){
            DB::table('users')->update([
                'password'=>bcrypt($request->password),
                // 'email'=>$request->email,
                'phone'=>$request->tel,
                'name'=>$request->name,
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        }
        else{
            DB::table('users')->update([
                // 'email'=>$request->email,
                'phone'=>$request->tel,
                'name'=>$request->name,
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        }
        
        return redirect()->route('edit-profile')->with('success',' Cập nhật thành công');
    }

}
