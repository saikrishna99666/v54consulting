<div class="card">
    <div class="card-body">
        <div class="row">
            {{-- Name --}}
            <div class="col-md-6 form-group">
                <label>Name *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $team->name ?? '') }}" required>
            </div>

            {{-- Qualification/Designation --}}
            <div class="col-md-6 form-group">
                <label>Qualification / Designation *</label>
                <input type="text" name="qualification" class="form-control" value="{{ old('qualification', $team->qualification ?? '') }}">
            </div>

            {{-- Description --}}
            <div class="col-md-12 form-group">
                <label>Description *</label>
                <textarea id="short_description" name="short_description" class="form-control" rows="5">{{ old('short_description', $team->short_description ?? '') }}</textarea>
            </div>

            {{-- Email --}}
            <div class="col-md-6 form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $team->email ?? '') }}">
            </div>

            {{-- Phone --}}
            <div class="col-md-6 form-group">
                <label>Phone / Contact</label>
                <input type="text" name="contactno" class="form-control" value="{{ old('contactno', $team->contactno ?? '') }}">
            </div>

            {{-- Profile Photo --}}
            <div class="col-md-6 form-group">
                <label>Profile Photo</label>
                <input type="file" name="profilephoto" class="form-control" accept="image/*">
                @if(isset($team) && $team->profilephoto)
                    <img src="{{ asset('uploads/team/' . $team->profilephoto) }}" class="img-thumbnail mt-2" width="100">
                @endif
            </div>

            {{-- Status --}}
            <div class="col-md-6 form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ old('status', $team->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $team->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-3"><i class="fas fa-save"></i> Save Member</button>
        <a href="{{ route('admin.team.index') }}" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
</div>
