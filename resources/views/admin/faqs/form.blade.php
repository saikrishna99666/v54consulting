<div class="card">
    <div class="card-body">
        <div class="row">
            {{-- Question --}}
            <div class="col-md-12 form-group">
                <label>Question *</label>
                <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question ?? '') }}">
            </div>

            {{-- Category --}}
            <div class="col-md-6 form-group">
                <label>Category *</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $faq->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Subcategory --}}
            <div class="col-md-6 form-group">
                <label>Subcategory</label>
                <select name="subcategory_id" id="subcategory_id" class="form-control">
                    <option value="">Select Subcategory</option>
                    @foreach($subcategories as $sub)
                        <option value="{{ $sub->id }}" data-parent="{{ $sub->parent_id }}"
                            {{ old('subcategory_id', $faq->subcategory_id ?? '') == $sub->id ? 'selected' : '' }}>
                            {{ $sub->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Answer --}}
            <div class="form-group col-lg-12">
                <label>Answer *</label>
                <textarea id="answer" name="answer" class="form-control" rows="4">{{ old('answer', $faq->answer ?? '') }}</textarea>
            </div>

            {{-- Status --}}
            <div class="col-md-6 form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ old('status', $faq->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $faq->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-3"><i class="fas fa-save"></i> Save FAQ</button>
        <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
</div>


