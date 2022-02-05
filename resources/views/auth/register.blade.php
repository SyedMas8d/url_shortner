@extends('layouts.header')

@section('content')

<div class="container h-100" style="margin-left: 614px;">
    <br><br><br><br><br>
    <h2>Create Account</h2>
    <br>
    
    <div class="row h-100 justify-content-center align-items-center">
        <form class="contact-form user-register" id="user-register">
            
            <div class="row justify-content-center">
            <div class="col-sm-6">
                <input type="text" name="username" placeholder="Name" id="username" class="form-control">
            </div>
            </div>
            <br>
            <div class="row justify-content-center">
            <div class="col-sm-6">
                <input type="email" name="email" placeholder="Email" id="email" class="form-control">
            </div>
            </div>

            <br>

            <div class="row justify-content-center">
            <div class="col-sm-6">
                <input type="password" name="password" placeholder="Password" id="password" class="form-control">
            </div>
            </div>

            <br>
            
            <!-- <div class="container"> -->
            <div class="row justify-content-center">

                <div class="col-sm-6">
                <button type="button" class="btn btn-success block resgiter">Register</button>
                </div>
            </div>
            <br>
            <p> Or </p><a href="{{url('/login')}}">Login</a>
            
            <div class="row justify-content-center">
                <div class="col-sm-4 loader">
                    <img src="{{url('/images/loader.gif')}}" alt="Loader">
                </div>
            </div>
            <!-- </div> -->
            
        </form>
    </div>
    
</div>

