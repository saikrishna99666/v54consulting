@extends('adminlte::page')

@section('title', 'Edit FAQ')

@section('content_header')
    <h1>Edit FAQ</h1>
@stop

@section('content')
    <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.faqs.form')
    </form>
@stop

@section('js')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        if($("#answer").length > 0) {
            CKEDITOR.replace('answer', { height: 200 });
        }

        // Dynamic Subcategory Filtering
        const categorySelect = $('#category_id');
        const subcategorySelect = $('#subcategory_id');
        const allSubOptions = subcategorySelect.find('option').clone();

        function filterSubcategories() {
            const selectedParentId = categorySelect.val();
            const currentSelectedSubId = subcategorySelect.val();
            
            subcategorySelect.empty().append('<option value="">Select Subcategory</option>');
            
            if (selectedParentId) {
                const filtered = allSubOptions.filter(function() {
                    return $(this).data('parent') == selectedParentId;
                });
                subcategorySelect.append(filtered);
            }
            
            // Restore previous value if it exists in the filtered list
            if (currentSelectedSubId) {
                subcategorySelect.val(currentSelectedSubId);
            }
        }

        categorySelect.on('change', filterSubcategories);
        
        // Initial filter for edit mode
        if (categorySelect.val()) {
            const currentSubId = "{{ old('subcategory_id', $faq->subcategory_id ?? '') }}";
            filterSubcategories();
            if(currentSubId) subcategorySelect.val(currentSubId);
        }
    });
</script>
@stop
