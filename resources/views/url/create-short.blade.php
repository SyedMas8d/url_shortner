@extends('layouts.header')

@section('content')

<div class="container">
  <h2>Create Short Url</h2> <h2> <a href="{{url('/logout')}}"> <button class="btn btn-primary">Logout</button> </a> </h2>
    <div class="container">
      <div class="row">

        <div class="col-sm-10">
        </div>

      </div>
    </div>
  
  <br>
  <form class="contact-form create_short_url" id="create_short_url">
    
    <div class="row">
      <div class="col-sm-6">
        <input type="text" name="url" placeholder="Enter your URL" id="url" class="form-control">
      </div>
    </div>
    <br>
    
    <div class="container">
      <div class="row">

        <div class="col-sm-10">
        </div>
        <div class="col-sm-2">
          <button type="button" class="btn btn-success block create-short-url">Create Short URL</button>
        </div>

       
      </div>
    </div>
    
  </form>
  
  <div class="row">
    <div class="col-sm-6">
      <h3 id="short_url"></h3>
    </div>
  </div>
</div>

