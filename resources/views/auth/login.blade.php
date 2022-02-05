@extends('layouts.header')

@section('content')

<div class="container h-100" style="margin-left: 614px;">
    <br><br><br><br><br>
    <h2>Login</h2>
    <br>
    
    <div class="row h-100 justify-content-center align-items-center">
        <form class="contact-form admin_login" id="admin_login">
            
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
                <button type="button" class="btn btn-success block login">LOGIN</button>
                </div>
                
            </div>
            <br>
            <p> Or </p><a href="{{url('/register')}}">Create Account</a>
            <br>
            <div class="row justify-content-center">

                <div class="col-sm-6">
                <a href="{{url('/google')}}"> Google Login</a>
                </div>
                
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-4 loader">
                    <img src="{{url('/images/loader.gif')}}" alt="Italian Trulli">
                </div>
            </div>
            <!-- </div> -->
            
        </form>
    </div>
    
</div>

