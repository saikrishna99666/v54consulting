<div class="card">
    <div class="card-body">
        <div class="row">
            {{-- Branch Name --}}
            <div class="col-md-12 form-group">
                <label for="name">Branch / Office Name *</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $branch->name ?? '') }}" placeholder="e.g. Head Office or Ameerpet Branch" required>
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Address --}}
            <div class="col-md-12 form-group">
                <label for="address">Address *</label>
                <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3" placeholder="Enter branch physical address" required>{{ old('address', $branch->address ?? '') }}</textarea>
                @error('address')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Phone Number --}}
            <div class="col-md-6 form-group">
                <label for="phone">Phone Number(s) *</label>
                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $branch->phone ?? '') }}" placeholder="e.g. +91 7286847203 / 9490091830" required>
                @error('phone')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Email --}}
            <div class="col-md-6 form-group">
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $branch->email ?? '') }}" placeholder="e.g. info@v54abroadstudies.com">
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Operating Hours --}}
            <div class="col-md-6 form-group">
                <label for="operating_hours">Operating Hours</label>
                <input type="text" name="operating_hours" id="operating_hours" class="form-control @error('operating_hours') is-invalid @enderror" value="{{ old('operating_hours', $branch->operating_hours ?? 'Monday to Saturday : 10:00 AM to 6:30 PM, Sunday : Closed') }}" placeholder="e.g. Monday to Saturday : 10:00 AM to 6:30 PM, Sunday : Closed">
                @error('operating_hours')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Is Head Office --}}
            <div class="col-md-6 form-group">
                <label for="is_head_office">Is Head Office? *</label>
                <select name="is_head_office" id="is_head_office" class="form-control @error('is_head_office') is-invalid @enderror" required>
                    <option value="0" {{ old('is_head_office', $branch->is_head_office ?? 0) == 0 ? 'selected' : '' }}>No (Counselling Branch)</option>
                    <option value="1" {{ old('is_head_office', $branch->is_head_office ?? 0) == 1 ? 'selected' : '' }}>Yes (Head Office)</option>
                </select>
                <small class="form-text text-muted">Setting this as Head Office will automatically set all other locations as regular branches.</small>
                @error('is_head_office')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Google Maps Embed Link --}}
            <div class="col-md-12 form-group">
                <label for="google_maps_link">Google Maps Embed iframe Source URL (src attribute)</label>
                <input type="text" name="google_maps_link" id="google_maps_link" class="form-control @error('google_maps_link') is-invalid @enderror" value="{{ old('google_maps_link', $branch->google_maps_link ?? '') }}" placeholder="e.g. https://www.google.com/maps/embed?pb=...">
                <small class="form-text text-muted">To get this, search the address on Google Maps, click "Share", choose "Embed a map", and copy <strong>only</strong> the URL inside the <code>src</code> attribute of the iframe code.</small>
                @error('google_maps_link')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-3"><i class="fas fa-save"></i> Save Location</button>
        <a href="{{ route('admin.branches.index') }}" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
</div>
