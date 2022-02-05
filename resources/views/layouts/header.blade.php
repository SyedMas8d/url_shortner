<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>URL Shortener</title>
    
    <script>
        site_url = "{{url('/')}}"
    </script>

    <!-- Font awsome -->
    <link rel="stylesheet" href="{{ asset('font-awsome/css/font-awesome.min.css') }}"/>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/> -->

    <style>
        .block {
            display: block;
            width: 100%;
            border: none;
            background-color: #04AA6D;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }
    </style>
    
</head>
<body>

    
@yield('content')

@extends('layouts.footer')