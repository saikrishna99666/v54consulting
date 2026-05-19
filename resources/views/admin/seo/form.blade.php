<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-6">
                <label>Page Name (Internal Use) *</label>
                <input type="text" name="page_name" class="form-control" value="{{ old('page_name', $seo->page_name ?? '') }}" placeholder="e.g. Home, About Us" required>
            </div>
            <div class="form-group col-md-6">
                <label>URL Path * (use / for home)</label>
                <input type="text" name="url_path" class="form-control" value="{{ old('url_path', $seo->url_path ?? '') }}" placeholder="e.g. /about or /" required>
            </div>
            
            <div class="form-group col-md-12">
                <hr>
                <h5>Meta Content</h5>
            </div>

            <div class="form-group col-md-6">
                <label>SEO Title</label>
                <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title', $seo->seo_title ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Canonical URL</label>
                <input type="text" name="canonical_url" class="form-control" value="{{ old('canonical_url', $seo->canonical_url ?? '') }}">
            </div>

            <div class="form-group col-md-4">
                <label>Include in XML Sitemap? *</label>
                <select name="in_sitemap" class="form-control" required>
                    <option value="1" {{ old('in_sitemap', $seo->in_sitemap ?? 1) == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('in_sitemap', $seo->in_sitemap ?? 1) == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Sitemap Priority *</label>
                <select name="sitemap_priority" class="form-control" required>
                    @foreach(['1.0', '0.9', '0.8', '0.7', '0.6', '0.5', '0.4', '0.3', '0.2', '0.1', '0.0'] as $p)
                        <option value="{{ $p }}" {{ old('sitemap_priority', $seo->sitemap_priority ?? '0.8') == $p ? 'selected' : '' }}>{{ $p }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Sitemap Change Frequency *</label>
                <select name="sitemap_changefreq" class="form-control" required>
                    @foreach(['always', 'hourly', 'daily', 'weekly', 'monthly', 'yearly', 'never'] as $f)
                        <option value="{{ $f }}" {{ old('sitemap_changefreq', $seo->sitemap_changefreq ?? 'weekly') == $f ? 'selected' : '' }}>{{ ucfirst($f) }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group col-md-12">
                <label>SEO Description</label>
                <textarea name="seo_description" class="form-control" rows="3">{{ old('seo_description', $seo->seo_description ?? '') }}</textarea>
            </div>
            
            <div class="form-group col-md-12">
                <label>SEO Keywords (Comma separated)</label>
                <textarea name="seo_keywords" class="form-control" rows="2">{{ old('seo_keywords', $seo->seo_keywords ?? '') }}</textarea>
            </div>

            <div class="form-group col-md-12">
                <hr>
                <h5>Social Media (Open Graph & Twitter)</h5>
            </div>

            <div class="form-group col-md-6">
                <label>OG Title</label>
                <input type="text" name="og_title" class="form-control" value="{{ old('og_title', $seo->og_title ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Twitter Title</label>
                <input type="text" name="twitter_title" class="form-control" value="{{ old('twitter_title', $seo->twitter_title ?? '') }}">
            </div>

            <div class="form-group col-md-12">
                <label>OG Description</label>
                <textarea name="og_description" class="form-control" rows="3">{{ old('og_description', $seo->og_description ?? '') }}</textarea>
            </div>

            <div class="form-group col-md-12">
                <label>Twitter Description</label>
                <textarea name="twitter_description" class="form-control" rows="3">{{ old('twitter_description', $seo->twitter_description ?? '') }}</textarea>
            </div>

            <div class="form-group col-md-12">
                <label>Social Sharing Image (OG Image)</label>
                <input type="file" name="og_image" class="form-control" accept="image/*">
                @if(isset($seo) && $seo->og_image)
                    <div class="mt-2">
                        <img src="{{ asset($seo->og_image) }}" class="img-thumbnail" style="max-height: 150px;">
                    </div>
                @endif
                <small class="form-text text-muted">Recommended size: 1200 x 630 pixels.</small>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save SEO Settings</button>
        <a href="{{ route('admin.seo-settings.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>
