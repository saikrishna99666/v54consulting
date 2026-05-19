@extends('adminlte::page')

@section('title', 'Add Ticker')

@section('content_header')
    <h1>Add New Ticker</h1>
@stop

@section('content')
    <form action="{{ route('admin.tickers.store') }}" method="POST">
        @csrf
        @include('admin.tickers.form')
    </form>
@stop
