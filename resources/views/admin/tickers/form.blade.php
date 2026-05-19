<div class="card">
    <div class="card-body">
        <div class="row">
            {{-- Title --}}
            <div class="col-md-12 form-group">
                <label>Ticker Text *</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $ticker->title ?? '') }}" required>
            </div>

            {{-- Status --}}
            <div class="col-md-6 form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="active" {{ old('status', $ticker->status ?? 'active') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $ticker->status ?? 'active') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-3"><i class="fas fa-save"></i> Save Ticker</button>
        <a href="{{ route('admin.tickers.index') }}" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
</div>
