@extends('adminlte::page')

@section('title', 'Edit Site Settings')

@section('content_header')
    <h1>Edit Site Settings</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    {{-- Company Name --}}
                    <div class="col-md-4 form-group">
                        <label>Company Name</label>
                        <input type="text" name="companyname" class="form-control" value="{{ old('companyname', $setting->companyname ?? '') }}">
                    </div>

                    {{-- Copyright Year --}}
                    <div class="col-md-2 form-group">
                        <label>Copyright Year</label>
                        <input type="text" name="copyrightyear" class="form-control" value="{{ old('copyrightyear', $setting->copyrightyear ?? date('Y')) }}">
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6 form-group">
                        <label>Main Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $setting->email ?? '') }}">
                    </div>

                    {{-- Phone --}}
                    <div class="col-md-6 form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $setting->phone_number ?? '') }}">
                    </div>

                    {{-- Address --}}
                    <div class="col-md-12 form-group">
                        <label>Full Address</label>
                        <textarea id="address" name="address" class="form-control" rows="2">{{ old('address', $setting->address ?? '') }}</textarea>
                    </div>

                    {{-- Google Maps Link --}}
                    <div class="col-md-12 form-group">
                        <label>Google Maps Embed Link (Paste the 'src' from the embed code)</label>
                        <input type="text" name="google_maps_link" class="form-control" value="{{ old('google_maps_link', $setting->google_maps_link ?? '') }}" placeholder="https://www.google.com/maps/embed?pb=...">
                        <small class="text-muted">Go to Google Maps -> Share -> Embed a map -> Copy the URL inside <b>src="..."</b></small>
                    </div>

                    {{-- Social Links --}}
                    <div class="col-md-3 form-group">
                        <label>Facebook Link</label>
                        <input type="url" name="facebook_link" class="form-control" value="{{ old('facebook_link', $setting->facebook_link ?? '') }}">
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Twitter Link</label>
                        <input type="url" name="twitter_link" class="form-control" value="{{ old('twitter_link', $setting->twitter_link ?? '') }}">
                    </div>
                    <div class="col-md-3 form-group">
                        <label>LinkedIn Link</label>
                        <input type="url" name="linkedin_link" class="form-control" value="{{ old('linkedin_link', $setting->linkedin_link ?? '') }}">
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Instagram Link</label>
                        <input type="url" name="instagram_link" class="form-control" value="{{ old('instagram_link', $setting->instagram_link ?? '') }}">
                    </div>
                    <div class="col-md-3 form-group">
                        <label>YouTube Link</label>
                        <input type="url" name="youtube_link" class="form-control" value="{{ old('youtube_link', $setting->youtube_link ?? '') }}">
                    </div>

                    {{-- Short Description --}}
                    <div class="col-md-12 form-group">
                        <label>Short Description (Appears in Sidebar/Offcanvas)</label>
                        <textarea name="about_short_description" class="form-control" rows="3">{{ old('about_short_description', $setting->about_short_description ?? '') }}</textarea>
                    </div>

                    {{-- Logo --}}
                    <div class="col-md-6 form-group">
                        <label>Main Logo (Dark/Black)</label>
                        <input type="file" name="logo" class="form-control" accept="image/*">
                        @if(isset($setting) && $setting->logoimage)
                            <img src="{{ asset('uploads/settings/' . $setting->logoimage) }}" class="img-thumbnail mt-2" width="150" style="background: #eee;">
                        @endif
                    </div>

                    {{-- White Logo --}}
                    <div class="col-md-6 form-group">
                        <label>Sidebar Logo (White/Light)</label>
                        <input type="file" name="white_logo" class="form-control" accept="image/*">
                        @if(isset($setting) && $setting->white_logoimage)
                            <img src="{{ asset('uploads/settings/' . $setting->white_logoimage) }}" class="img-thumbnail mt-2" width="150" style="background: #333;">
                        @endif
                    </div>

                    {{-- Preloader Image --}}
                    <div class="col-md-4 form-group">
                        <label>Custom Preloader Image (GIF/PNG/JPG)</label>
                        <input type="file" name="preloader_image" class="form-control" accept="image/*">
                        @if(isset($setting) && $setting->preloader_image)
                            <img src="{{ asset('uploads/settings/' . $setting->preloader_image) }}" class="img-thumbnail mt-2" width="150">
                        @endif
                    </div>

                    {{-- Breadcrumb Image --}}
                    <div class="col-md-4 form-group">
                        <label>Default Breadcrumb Image</label>
                        <input type="file" name="breadcrumb_image" class="form-control" accept="image/*">
                        @if(isset($setting) && $setting->breadcrumb_image)
                            <img src="{{ asset('uploads/settings/' . $setting->breadcrumb_image) }}" class="img-thumbnail mt-2" width="150">
                        @endif
                    </div>
                </div>

                {{-- SMTP Settings --}}
                <hr>
                <h4>SMTP Configurations</h4>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Mail Mailer (e.g., smtp)</label>
                        <input type="text" name="mail_mailer" class="form-control" value="{{ old('mail_mailer', $setting->mail_mailer ?? '') }}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Mail Host</label>
                        <input type="text" name="mail_host" class="form-control" value="{{ old('mail_host', $setting->mail_host ?? '') }}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Mail Port</label>
                        <input type="text" name="mail_port" class="form-control" value="{{ old('mail_port', $setting->mail_port ?? '') }}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Mail Username</label>
                        <input type="text" name="mail_username" class="form-control" value="{{ old('mail_username', $setting->mail_username ?? '') }}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Mail Password</label>
                        <input type="text" name="mail_password" class="form-control" value="{{ old('mail_password', $setting->mail_password ?? '') }}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Mail Encryption</label>
                        <input type="text" name="mail_encryption" class="form-control" value="{{ old('mail_encryption', $setting->mail_encryption ?? '') }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-3"><i class="fas fa-save"></i> Save Settings</button>
                <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Back</a>

            </form>
        </div>
    </div>
@stop

@section('js')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        // CKEditor removed for address to prevent unwanted <p> tags
    });
</script>
@stop
