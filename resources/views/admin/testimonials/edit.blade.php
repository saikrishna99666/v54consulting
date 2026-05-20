@extends('adminlte::page')

@section('title', 'Edit Student Testimonial')

@section('content_header')
    <h1>Edit Student Testimonial</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.testimonials.form')
            </form>
        </div>
    </div>
</div>
@stop
