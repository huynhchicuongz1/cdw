@extends('layout.master')
@section('content')
    

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-3">
                    <h2>Log in to your account</h2>
                    @if (session()->has('fail_msg'))
                        <p style="color:red;border:1px solid red;">{{session('fail_msg')}}</p>
                    @endif
                    @if ($errors->any())
                    @foreach ($errors->all() as $item)
                        
                    @endforeach
                        <p style="color:red;border:1px solid red;">{{$item}}</p>
                    @endif
                    
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form role="form" method="post" action="{{route('login-post')}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label">Emailasdasd Address:</label>
                                    <input name="email" type="email" class="form-control" placeholder="Enter your email address">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Password:</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter your password">
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Log In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
