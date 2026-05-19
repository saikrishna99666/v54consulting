@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Welcome to Admin Panel</h3>
    </div>
    <div class="card-body">
        <p>You are logged in!</p>
    </div>
</div>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop