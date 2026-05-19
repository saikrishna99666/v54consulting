<div class="card">
    <div class="card-body">
        <div class="row">
            {{-- Job Title --}}
            <div class="col-md-12 form-group">
                <label for="title">Job Title *</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $career->title ?? '') }}" placeholder="e.g. Senior Study Abroad Consultant" required>
                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Location --}}
            <div class="col-md-6 form-group">
                <label for="location">Location *</label>
                <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $career->location ?? 'Hyderabad') }}" placeholder="e.g. Hyderabad" required>
                @error('location')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Type --}}
            <div class="col-md-6 form-group">
                <label for="type">Job Type *</label>
                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                    <option value="Full Time" {{ old('type', $career->type ?? '') == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                    <option value="Part Time" {{ old('type', $career->type ?? '') == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                    <option value="Contract" {{ old('type', $career->type ?? '') == 'Contract' ? 'selected' : '' }}>Contract</option>
                    <option value="Remote" {{ old('type', $career->type ?? '') == 'Remote' ? 'selected' : '' }}>Remote</option>
                </select>
                @error('type')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Description --}}
            <div class="col-md-12 form-group">
                <label for="description">Job Description *</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" required>{{ old('description', $career->description ?? '') }}</textarea>
                @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Requirements --}}
            <div class="col-md-12 form-group">
                <label for="requirements">Job Requirements / Qualifications</label>
                <textarea name="requirements" id="requirements" class="form-control @error('requirements') is-invalid @enderror" rows="4">{{ old('requirements', $career->requirements ?? '') }}</textarea>
                @error('requirements')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Status --}}
            <div class="col-md-6 form-group">
                <label for="status">Status *</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option value="1" {{ old('status', $career->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $career->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-3"><i class="fas fa-save"></i> Save Job Opening</button>
        <a href="{{ route('admin.careers.index') }}" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
</div>
