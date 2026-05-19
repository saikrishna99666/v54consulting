@extends('adminlte::page')

@section('title', 'Manage Why Choose Us')

@section('content_header')
    <h1>Manage Why Choose Us</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.why-choose-us.update', $content->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">General Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Subtitle</label>
                                <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $content->subtitle) }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Main Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $content->title) }}">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Main Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ old('description', $content->description) }}</textarea>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Experience Years (e.g., 20+)</label>
                                <input type="text" name="experience_years" class="form-control" value="{{ old('experience_years', $content->experience_years) }}">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $content->phone) }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Mission Tab -->
                    <div class="col-md-6">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Mission Section</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Mission Title</label>
                                    <input type="text" name="mission_title" class="form-control" value="{{ old('mission_title', $content->mission_title) }}">
                                </div>
                                <div class="form-group">
                                    <label>Mission Description</label>
                                    <textarea name="mission_description" class="form-control" rows="3">{{ old('mission_description', $content->mission_description) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Mission Points</label>
                                    <div id="mission-points-container">
                                        @if($content->mission_points)
                                            @foreach($content->mission_points as $point)
                                                <div class="input-group mb-2 pt-point">
                                                    <input type="text" name="mission_points[]" class="form-control" value="{{ $point }}">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-danger remove-point"><i class="fas fa-times"></i></button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-sm btn-info" id="add-mission-point"><i class="fas fa-plus"></i> Add Point</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vision Tab -->
                    <div class="col-md-6">
                        <div class="card card-success card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Vision Section</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Vision Title</label>
                                    <input type="text" name="vision_title" class="form-control" value="{{ old('vision_title', $content->vision_title) }}">
                                </div>
                                <div class="form-group">
                                    <label>Vision Description</label>
                                    <textarea name="vision_description" class="form-control" rows="3">{{ old('vision_description', $content->vision_description) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Vision Points</label>
                                    <div id="vision-points-container">
                                        @if($content->vision_points)
                                            @foreach($content->vision_points as $point)
                                                <div class="input-group mb-2 pt-point">
                                                    <input type="text" name="vision_points[]" class="form-control" value="{{ $point }}">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-danger remove-point"><i class="fas fa-times"></i></button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-sm btn-success" id="add-vision-point"><i class="fas fa-plus"></i> Add Point</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-secondary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Action Button</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Button Text</label>
                                <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $content->button_text) }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Button Link</label>
                                <input type="text" name="button_link" class="form-control" value="{{ old('button_link', $content->button_link) }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // Add Mission Point
            $('#add-mission-point').click(function() {
                var html = `
                    <div class="input-group mb-2 pt-point">
                        <input type="text" name="mission_points[]" class="form-control" placeholder="Enter mission point">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-danger remove-point"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                `;
                $('#mission-points-container').append(html);
            });

            // Add Vision Point
            $('#add-vision-point').click(function() {
                var html = `
                    <div class="input-group mb-2 pt-point">
                        <input type="text" name="vision_points[]" class="form-control" placeholder="Enter vision point">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-danger remove-point"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                `;
                $('#vision-points-container').append(html);
            });

            // Remove Point
            $(document).on('click', '.remove-point', function() {
                $(this).closest('.pt-point').remove();
            });
        });
    </script>
@stop
