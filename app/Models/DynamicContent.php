<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'logoimage',
        'white_logoimage',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'instagram_link',
        'phone_number',
        'operating_hours',
        'companyname',
        'copyrightyear',
        'description',
        'email',
        'notification_email',
        'cc_email',
        'mail_mailer',
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'mail_encryption',
        'mail_from_address',
        'mail_from_name',
        'address',
        'google_maps_link',
        'about_subtitle',
        'about_title',
        'about_short_description',
        'about_long_description',
        'about_point_1',
        'about_point_2',
        'preloader_image',
        'breadcrumb_image',
        'youtube_link',
        'privacy_policy',
        'terms_conditions',
    ];
}
