<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $table = 'services';
    public $primaryKey = 'Serviceid';
    protected $fillable = [
        'Serviceid',
        'serviceuid',
        'ServicesTitle',
        'ServicesText',
        'servicesUrl',
        'servicesdate',
        'other',
        'navbartext',
        'serviceimage',
        'status',
        'updated_at',
        'bannervideourl',
        'icon',
        'bannertitle',
        'pagecategory',
        'pagesubcategory',
        'created_at',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'seo_image',
        'canonical_url',
        'og_title',
        'og_description',
        'og_image',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'category_id',
        'subcategory_id',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(ServiceCategory::class, 'subcategory_id');
    }

    public function videos()
    {
        return $this->hasMany(ServiceVideo::class, 'Serviceid', 'Serviceid');
    }

    public function galleries()
    {
        return $this->hasMany(ServiceGallery::class, 'Serviceid', 'Serviceid');
    }

}

