@extends('adminlte::page')

@section('title', 'Edit About Us Content')

@section('content_header')
    <h1>Edit About Us Content</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    {{-- Subtitle --}}
                    <div class="col-md-6 form-group">
                        <label>Subtitle (e.g., About Our Consultancy)</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $about->subtitle ?? '') }}">
                    </div>

                    {{-- Title --}}
                    <div class="col-md-6 form-group">
                        <label>Title (e.g., Turning Study Abroad Dreams Into Reality)</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $about->title ?? '') }}">
                    </div>

                    {{-- Short Description --}}
                    <div class="col-md-12 form-group">
                        <label>Short Description (Home Page)</label>
                        <textarea id="short_description" name="short_description" class="form-control" rows="3">{{ old('short_description', $about->short_description ?? '') }}</textarea>
                    </div>

                    {{-- Long Description --}}
                    <div class="col-md-12 form-group">
                        <label>Long Description (About Us Page)</label>
                        <textarea id="long_description" name="long_description" class="form-control" rows="5">{{ old('long_description', $about->long_description ?? '') }}</textarea>
                    </div>

                    {{-- Repeatable Points --}}
                    <div class="col-md-12 form-group">
                        <label>Highlight Points</label>
                        <div id="points-container">
                            @if(isset($about->points) && is_array($about->points) && count($about->points) > 0)
                                @foreach($about->points as $point)
                                    <div class="input-group mb-2 point-row">
                                        <input type="text" name="points[]" class="form-control" value="{{ $point }}" placeholder="Enter highlight point">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-danger remove-point"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="input-group mb-2 point-row">
                                    <input type="text" name="points[]" class="form-control" placeholder="Enter highlight point">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-danger remove-point"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" id="add-point" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Another Point</button>
                    </div>

                    {{-- Buttons --}}
                    <div class="col-md-6 form-group">
                        <label>Button Text</label>
                        <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $about->button_text ?? 'Get Started') }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Button Link</label>
                        <input type="text" name="button_link" class="form-control" value="{{ old('button_link', $about->button_link ?? '/about') }}">
                    </div>

                    {{-- Images --}}
                    <div class="col-md-6 form-group">
                        <label>About Image 1 (Left Image)</label>
                        <input type="file" name="image_1" class="form-control" accept="image/*">
                        @if(isset($about) && $about->image_1)
                            <img src="{{ asset('uploads/about/' . $about->image_1) }}" class="img-thumbnail mt-2" width="200">
                        @endif
                    </div>
                    <div class="col-md-6 form-group">
                        <label>About Image 2 (Small Overlap Image)</label>
                        <input type="file" name="image_2" class="form-control" accept="image/*">
                        @if(isset($about) && $about->image_2)
                            <img src="{{ asset('uploads/about/' . $about->image_2) }}" class="img-thumbnail mt-2" width="200">
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-3"><i class="fas fa-save"></i> Save Content</button>

            </form>
        </div>
    </div>
@stop

@section('js')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        if($('#short_description').length) {
            CKEDITOR.replace('short_description', { height: 200 });
        }
        if($('#long_description').length) {
            CKEDITOR.replace('long_description', { height: 350 });
        }

        // Add Point
        $('#add-point').click(function() {
            var html = '<div class="input-group mb-2 point-row">' +
                       '<input type="text" name="points[]" class="form-control" placeholder="Enter highlight point">' +
                       '<div class="input-group-append">' +
                       '<button type="button" class="btn btn-danger remove-point"><i class="fas fa-trash"></i></button>' +
                       '</div>' +
                       '</div>';
            $('#points-container').append(html);
        });

        // Remove Point
        $(document).on('click', '.remove-point', function() {
            if ($('.point-row').length > 1) {
                $(this).closest('.point-row').remove();
            } else {
                $(this).closest('.point-row').find('input').val('');
            }
        });
    });
</script>
@stop
