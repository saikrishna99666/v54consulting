<div class="row">
    <!-- Left Column: Edit Form Inputs -->
    <div class="col-lg-7">
        <div class="card shadow-sm border-0" style="border-radius: 16px;">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="m-0 font-weight-bold text-dark"><i class="fas fa-edit text-primary mr-2"></i> Testimonial Information</h5>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    {{-- Name --}}
                    <div class="col-md-6 form-group mb-3">
                        <label class="font-weight-bold text-secondary">Student Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control rounded-lg" value="{{ old('name', $testimonial->name ?? '') }}" required placeholder="e.g. Sohel Tanvir" style="padding: 10px 15px; border-radius: 8px;">
                        @error('name')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Destination --}}
                    <div class="col-md-6 form-group mb-3">
                        <label class="font-weight-bold text-secondary">Visa / Destination details <span class="text-danger">*</span></label>
                        <input type="text" name="destination" class="form-control rounded-lg" value="{{ old('destination', $testimonial->destination ?? '') }}" required placeholder="e.g. Canada Student Visa" style="padding: 10px 15px; border-radius: 8px;">
                        @error('destination')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Stars --}}
                    <div class="col-md-6 form-group mb-3">
                        <label class="font-weight-bold text-secondary">Rating Stars <span class="text-danger">*</span></label>
                        <select name="stars" class="form-control rounded-lg" style="height: auto; padding: 10px 15px; border-radius: 8px;">
                            <option value="5" {{ old('stars', $testimonial->stars ?? 5) == 5 ? 'selected' : '' }}>5 Stars</option>
                            <option value="4" {{ old('stars', $testimonial->stars ?? 5) == 4 ? 'selected' : '' }}>4 Stars</option>
                            <option value="3" {{ old('stars', $testimonial->stars ?? 5) == 3 ? 'selected' : '' }}>3 Stars</option>
                            <option value="2" {{ old('stars', $testimonial->stars ?? 5) == 2 ? 'selected' : '' }}>2 Stars</option>
                            <option value="1" {{ old('stars', $testimonial->stars ?? 5) == 1 ? 'selected' : '' }}>1 Star</option>
                        </select>
                        @error('stars')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 form-group mb-3">
                        <label class="font-weight-bold text-secondary">Status</label>
                        <select name="status" class="form-control rounded-lg" style="height: auto; padding: 10px 15px; border-radius: 8px;">
                            <option value="1" {{ old('status', $testimonial->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $testimonial->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Quote --}}
                    <div class="col-md-12 form-group mb-3">
                        <label class="font-weight-bold text-secondary">Student Quote / Feedback <span class="text-danger">*</span></label>
                        <textarea name="quote" class="form-control rounded-lg" rows="5" required placeholder="Write student's testimonial feedback here..." style="padding: 15px; border-radius: 8px;">{{ old('quote', $testimonial->quote ?? '') }}</textarea>
                        @error('quote')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div class="col-md-12 form-group">
                        <label class="font-weight-bold text-secondary">Avatar / Student Headshot</label>
                        <input type="file" name="image" class="form-control-file border p-2 rounded-lg w-100" accept="image/*" style="border-radius: 8px;">
                        <span class="text-muted small mt-1 d-block"><i class="fas fa-info-circle mr-1"></i> Recommended size: 120x120px, PNG or JPG format.</span>
                        @error('image')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                        <div class="mt-3">
                            <span class="d-block font-weight-bold text-xs text-muted mb-2">Avatar Preview:</span>
                            <img id="form-avatar-preview" src="{{ isset($testimonial) && $testimonial->image ? asset('uploads/testimonials/' . $testimonial->image) : asset('assets/img/home-1/testimonial/client.png') }}" class="img-thumbnail rounded-circle shadow-sm" width="80" height="80" style="object-fit: cover;">
                        </div>
                    </div>
                </div>

                <div class="mt-4 border-top pt-3">
                    <button type="submit" class="btn btn-success rounded-pill px-4 mr-2"><i class="fas fa-save mr-1"></i> Save Testimonial</button>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary rounded-pill px-4"><i class="fas fa-arrow-left mr-1"></i> Back</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Interactive Real-time Testimonial Card Preview -->
    <div class="col-lg-5">
        <div class="card shadow-sm border-0 sticky-top" style="border-radius: 16px; top: 30px; overflow: hidden; background: #F8FAFC;">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="m-0 font-weight-bold text-primary"><i class="fas fa-eye mr-2"></i> Real-time Live Preview</h5>
                <span class="text-muted text-xs">Exactly how it will look on the homepage</span>
            </div>
            
            <div class="card-body d-flex align-items-center justify-content-center p-4" style="min-height: 420px; background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);">
                <!-- Premium Testimonial Card Replicate -->
                <div class="premium-testimonial-card shadow-lg w-100" style="background: #ffffff; border: 1px solid rgba(0, 72, 180, 0.05); border-radius: 24px; padding: 35px 30px; position: relative; min-height: 330px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 15px 35px rgba(0,0,0,0.05) !important;">
                    <!-- Elegant quote icon top right -->
                    <div class="card-quote-icon" style="position: absolute; top: 30px; right: 30px; font-size: 38px; color: rgba(0, 72, 180, 0.08);">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    
                    <div>
                        <!-- Stars rating container -->
                        <div class="star-rating mb-3" id="preview-stars" style="margin-bottom: 20px;">
                            <!-- Dynamically populated -->
                        </div>
                        
                        <!-- Testimonial Quote text -->
                        <p class="testimonial-text mb-4" id="preview-quote" style="font-size: 15.5px; line-height: 1.7; color: #535761; font-style: italic; font-weight: 500; margin-bottom: 30px;">
                            "Feedback text will appear here as you type..."
                        </p>
                    </div>
                    
                    <!-- Avatar and Client info -->
                    <div class="client-meta" style="display: flex; align-items: center; gap: 16px; margin-top: auto;">
                        <div class="client-avatar" style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden; border: 2px solid #fff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); flex-shrink: 0;">
                            <img id="preview-avatar" src="{{ isset($testimonial) && $testimonial->image ? asset('uploads/testimonials/' . $testimonial->image) : asset('assets/img/home-1/testimonial/client.png') }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="client-info">
                            <h4 id="preview-name" style="font-size: 17px; font-weight: 800; color: #151A26; margin: 0 0 4px 0; font-family: sans-serif;">Student Name</h4>
                            <span class="destination" style="font-size: 12px; font-weight: 600; color: #0048B4; text-transform: uppercase; display: flex; align-items: center; gap: 5px;">
                                <i class="fas fa-location-dot"></i> <span id="preview-destination">Study Destination</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to update preview in real-time -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const nameInput = document.querySelector('input[name="name"]');
    const destInput = document.querySelector('input[name="destination"]');
    const starsSelect = document.querySelector('select[name="stars"]');
    const quoteTextarea = document.querySelector('textarea[name="quote"]');
    const imageInput = document.querySelector('input[name="image"]');

    const previewName = document.getElementById('preview-name');
    const previewDestination = document.getElementById('preview-destination');
    const previewStars = document.getElementById('preview-stars');
    const previewQuote = document.getElementById('preview-quote');
    const previewAvatar = document.getElementById('preview-avatar');
    const formAvatarPreview = document.getElementById('form-avatar-preview');

    const defaultAvatar = "{{ asset('assets/img/home-1/testimonial/client.png') }}";

    function updatePreview() {
        // Name
        previewName.textContent = nameInput.value.trim() || 'Student Name';
        
        // Destination
        previewDestination.textContent = destInput.value.trim() || 'Study Destination';
        
        // Quote
        previewQuote.textContent = quoteTextarea.value.trim() ? `"${quoteTextarea.value.trim()}"` : '"Feedback text will appear here as you type..."';
        
        // Stars
        const starCount = parseInt(starsSelect.value) || 5;
        let starHtml = '';
        for (let i = 1; i <= 5; i++) {
            if (i <= starCount) {
                starHtml += '<i class="fas fa-star" style="color: #FFB800; margin-right: 2px; font-size: 14px;"></i>';
            } else {
                starHtml += '<i class="far fa-star" style="color: rgba(255, 184, 0, 0.2); margin-right: 2px; font-size: 14px;"></i>';
            }
        }
        previewStars.innerHTML = starHtml;
    }

    // Bind real-time input event listeners
    nameInput.addEventListener('input', updatePreview);
    destInput.addEventListener('input', updatePreview);
    quoteTextarea.addEventListener('input', updatePreview);
    starsSelect.addEventListener('change', updatePreview);

    // Bind real-time image file upload reader
    imageInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewAvatar.src = e.target.result;
                formAvatarPreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        } else {
            // Reset to stored image if cancel/empty
            const currentSrc = "{{ isset($testimonial) && $testimonial->image ? asset('uploads/testimonials/' . $testimonial->image) : asset('assets/img/home-1/testimonial/client.png') }}";
            previewAvatar.src = currentSrc;
            formAvatarPreview.src = currentSrc;
        }
    });

    // Run initial update to populate current record details on load
    updatePreview();
});
</script>
