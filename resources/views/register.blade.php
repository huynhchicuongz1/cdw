@extends('layout.master')
@section('content')
    

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-push-3">
                <h2>Join as a Wordskills Travel Member</h2>
                <p>
                    @if ($errors->any)
                        
                        @foreach ($errors->all() as $error )
                        <p style="color:red;border:1px solid red;">{{ $error}}</p>
                        @endforeach

                    @endif
                    @if(session()->has('success'))
                    <p style="color:green;border:1px solid green;">{{session('success')}}</p>
                    @endif
                </p>
                <div class="panel panel-default">
                    <div class="panel-body">
                    <form id="register-form" role="form" method="post" action="{{route('register-post') }}">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label">Email Address:</label>
                                <input id="email" name="email" type="email" class="form-control" placeholder="Enter your email address">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password:</label>
                                <input id="password" name="password" type="password" class="form-control" placeholder="Enter your password">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Name:</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Phone Number:</label>
                                <input id="tel" name="tel" type="tel" class="form-control" placeholder="Enter your phone number">
                            </div>
                            <div class="text-right">
                                <button id="register-btn" type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

