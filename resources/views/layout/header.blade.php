<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flights - Worldskills Travel</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/style.css') }}">
    <?php date_default_timezone_set('Asia/Ho_Chi_Minh') ?>
</head>
<body>
<div class="wrapper">
    <header>
        <nav class="navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">Worldskills Travel</a>
                </div>
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="nav navbar-nav navbar-right">
                        
                        @if (Auth::check())
                        <li><a href="{{route('edit-profile')}}">Welcome {{Auth::user()->name}}</a></li>
                        <li><a href="{{route('index')}}">Flights</a></li>
                        
                        <li><a href="{{route('logout')}}">Logout</a></li>
                        @else
                            <li><a href="#">Welcome message</a></li>
                            <li><a href="{{route('index')}}">Flights</a></li>
                            <li><a href="login-get">Log In</a></li>
                            <li><a href="{{route('register')}}">Register</a></li>
                        @endif
                        

                    </ul>
                </div>
            </div>
        </nav>
    </header>