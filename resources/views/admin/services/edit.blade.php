@extends('adminlte::page')

@section('title', 'Edit Service')

@section('content_header')
    <h1>Edit Service</h1>
@stop

@section('content')
    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.services.form')
    </form>
@stop

@section('js')
<script>
    function addVideo() {
        const div = document.createElement("div");
        div.className = "d-flex mt-2";
        div.innerHTML = `
            <input type="text" name="videos[]" class="form-control" placeholder="YouTube URL">
            <button type="button" class="btn btn-danger btn-sm ml-2" onclick="this.parentElement.remove()">X</button>
        `;
        document.getElementById("videoArea").appendChild(div);
    }
</script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        if($("#ServicesText").length > 0) {
            CKEDITOR.replace('ServicesText');
        }

        // Dynamic Subcategory Filtering
        const categorySelect = $('#category_id');
        const subcategorySelect = $('#subcategory_id');
        const allSubOptions = subcategorySelect.find('option').clone();

        function filterSubcategories() {
            const selectedParentId = categorySelect.val();
            const currentSelectedSubId = subcategorySelect.val();
            
            subcategorySelect.empty().append('<option value="">Select Sub Category</option>');
            
            if (selectedParentId) {
                const filtered = allSubOptions.filter(function() {
                    return $(this).data('parent') == selectedParentId;
                });
                subcategorySelect.append(filtered);
            }
            
            // Try to restore previous value if it matches the current set
            if (currentSelectedSubId) {
                subcategorySelect.val(currentSelectedSubId);
            }
        }

        categorySelect.on('change', function() {
            filterSubcategories();
        });
        
        // Initial filter for edit mode
        if (categorySelect.val()) {
            const currentSubId = "{{ old('subcategory_id', $service->subcategory_id ?? '') }}";
            filterSubcategories();
            subcategorySelect.val(currentSubId);
        }

        // Automatic Slug Generation
        $('#ServicesTitle').on('input', function() {
            let title = $(this).val();
            let slug = title.toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '') // Remove non-word characters (except spaces and dashes)
                .replace(/[\s_-]+/g, '-') // Replace spaces and underscores with a single dash
                .replace(/^-+|-+$/g, ''); // Trim leading and trailing dashes
            $('#servicesUrl').val(slug);
        });
    });
</script>
@stop
