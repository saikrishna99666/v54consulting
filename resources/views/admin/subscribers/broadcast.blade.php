@extends('adminlte::page')

@section('title', 'Send Announcement')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Send Message to Subscribers</h1>
        <a href="{{ route('admin.subscribers.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Compose Message</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.subscribers.send') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" id="subject" placeholder="Enter email subject" value="{{ old('subject') }}" required>
                            @error('subject')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="message">Message Body</label>
                            <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" rows="10" required>{{ old('message') }}</textarea>
                            @error('message')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to send this message to ALL subscribers?')">
                            <i class="fas fa-paper-plane"></i> Send to All Subscribers
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        if($('#message').length) {
            CKEDITOR.replace('message', {
                height: 300
            });
        }
    });
</script>
@stop
