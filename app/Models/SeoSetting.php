<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_name',
        'url_path',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'og_title',
        'og_description',
        'og_image',
        'twitter_title',
        'twitter_description',
        'canonical_url',
        'in_sitemap',
        'sitemap_priority',
        'sitemap_changefreq',
    ];

    protected $casts = [
        'in_sitemap' => 'boolean',
    ];
}
