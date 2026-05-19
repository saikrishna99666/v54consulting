@extends('adminlte::page')

@section('title', 'Edit Ticker')

@section('content_header')
    <h1>Edit Ticker</h1>
@stop

@section('content')
    <form action="{{ route('admin.tickers.update', $ticker) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.tickers.form')
    </form>
@stop
