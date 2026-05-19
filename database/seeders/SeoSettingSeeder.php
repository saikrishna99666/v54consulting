<?php

namespace Database\Seeders;

use App\Models\SeoSetting;
use Illuminate\Database\Seeder;

class SeoSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeoSetting::truncate();

        SeoSetting::create([
            'page_name' => 'Homepage',
            'url_path' => '/',
            'seo_title' => 'V54 Abroad Study Advisors – Premier Study Abroad Consultants',
            'seo_description' => 'V54 Abroad Study Advisors is a premier immigration and student visa consultancy helping students achieve their global education dreams.',
            'seo_keywords' => 'study abroad, student visa, education advisor, overseas consulting',
            'og_title' => 'V54 Abroad Study Advisors – Premier Study Abroad Consultants',
            'og_description' => 'V54 Abroad Study Advisors is a premier immigration and student visa consultancy.',
            'canonical_url' => 'https://v54abroadstudies.com/',
            'in_sitemap' => true,
            'sitemap_priority' => '1.0',
            'sitemap_changefreq' => 'daily'
        ]);

        SeoSetting::create([
            'page_name' => 'About Us',
            'url_path' => '/about',
            'seo_title' => 'About Us – V54 Abroad Study Advisors',
            'seo_description' => 'Learn about V54 Abroad Study Advisors, our mission, vision, and team of experienced overseas education consultants.',
            'seo_keywords' => 'about v54, overseas consultants, student visa experts',
            'og_title' => 'About Us – V54 Abroad Study Advisors',
            'og_description' => 'Learn about V54 Abroad Study Advisors, our mission, and our dedicated team.',
            'canonical_url' => 'https://v54abroadstudies.com/about',
            'in_sitemap' => true,
            'sitemap_priority' => '0.8',
            'sitemap_changefreq' => 'monthly'
        ]);

        SeoSetting::create([
            'page_name' => 'Services Listing',
            'url_path' => '/services',
            'seo_title' => 'Our Services – V54 Abroad Study Advisors',
            'seo_description' => 'Explore our study abroad consultancy services including student visa guidance, university selection, application support, and pre-departure briefings.',
            'seo_keywords' => 'student visa assistance, university selection, application assistance, study abroad services',
            'og_title' => 'Our Services – V54 Abroad Study Advisors',
            'og_description' => 'Explore our student visa and university admission consulting services.',
            'canonical_url' => 'https://v54abroadstudies.com/services',
            'in_sitemap' => true,
            'sitemap_priority' => '0.8',
            'sitemap_changefreq' => 'weekly'
        ]);

        SeoSetting::create([
            'page_name' => 'Counselling Branches',
            'url_path' => '/branches',
            'seo_title' => 'Our Branches – V54 Abroad Study Advisors',
            'seo_description' => 'Find the nearest V54 Abroad Study Advisors counselling branch. Visit our branches in Ameerpet, Begumpet, Mangalpally, and Guntur.',
            'seo_keywords' => 'counselling branches, visa advisors near me, hyderabad study abroad',
            'og_title' => 'Our Branches – V54 Abroad Study Advisors',
            'og_description' => 'Find the nearest V54 Abroad Study Advisors counselling branch in your region.',
            'canonical_url' => 'https://v54abroadstudies.com/branches',
            'in_sitemap' => true,
            'sitemap_priority' => '0.8',
            'sitemap_changefreq' => 'monthly'
        ]);

        SeoSetting::create([
            'page_name' => 'Careers',
            'url_path' => '/careers',
            'seo_title' => 'Careers & Job Openings – V54 Abroad Study Advisors',
            'seo_description' => 'Join the dynamic team at V54 Abroad Study Advisors. Explore current career opportunities in overseas education counselling and administration.',
            'seo_keywords' => 'careers at v54, visa advisor jobs, student counsellor openings',
            'og_title' => 'Careers & Job Openings – V54 Abroad Study Advisors',
            'og_description' => 'Join the dynamic team at V54 Abroad Study Advisors.',
            'canonical_url' => 'https://v54abroadstudies.com/careers',
            'in_sitemap' => true,
            'sitemap_priority' => '0.7',
            'sitemap_changefreq' => 'monthly'
        ]);

        SeoSetting::create([
            'page_name' => 'Blogs & News',
            'url_path' => '/blog',
            'seo_title' => 'Latest News & Blogs – V54 Abroad Study Advisors',
            'seo_description' => 'Read our latest blogs, migration updates, scholarship alerts, and visa guidelines to stay informed about international education.',
            'seo_keywords' => 'study abroad blog, scholarship updates, student visa news',
            'og_title' => 'Latest News & Blogs – V54 Abroad Study Advisors',
            'og_description' => 'Read our latest blogs, migration updates, and visa guidelines.',
            'canonical_url' => 'https://v54abroadstudies.com/blog',
            'in_sitemap' => true,
            'sitemap_priority' => '0.8',
            'sitemap_changefreq' => 'weekly'
        ]);

        SeoSetting::create([
            'page_name' => 'Frequently Asked Questions',
            'url_path' => '/faq',
            'seo_title' => 'FAQs – V54 Abroad Study Advisors',
            'seo_description' => 'Get answers to frequently asked questions about study visa applications, university fees, scholarships, and post-study work opportunities.',
            'seo_keywords' => 'study abroad faq, visa query help, university admission questions',
            'og_title' => 'FAQs – V54 Abroad Study Advisors',
            'og_description' => 'Get answers to frequently asked questions about study visa applications and university admissions.',
            'canonical_url' => 'https://v54abroadstudies.com/faq',
            'in_sitemap' => true,
            'sitemap_priority' => '0.7',
            'sitemap_changefreq' => 'monthly'
        ]);

        SeoSetting::create([
            'page_name' => 'Contact Us',
            'url_path' => '/contact',
            'seo_title' => 'Contact Us – V54 Abroad Study Advisors',
            'seo_description' => 'Get in touch with our Head Office and professional counselors today to start your overseas education journey.',
            'seo_keywords' => 'contact v54, overseas consultants phone number, study abroad email',
            'og_title' => 'Contact Us – V54 Abroad Study Advisors',
            'og_description' => 'Get in touch with our expert advisors and start your overseas education journey.',
            'canonical_url' => 'https://v54abroadstudies.com/contact',
            'in_sitemap' => true,
            'sitemap_priority' => '0.8',
            'sitemap_changefreq' => 'monthly'
        ]);

        // Service Details Pages
        SeoSetting::create([
            'page_name' => 'Service Detail - Student Visa',
            'url_path' => '/services/student-visa',
            'seo_title' => 'Student Visa Assistance – V54 Abroad Study Advisors',
            'seo_description' => 'Get comprehensive student visa application guidance for Canada, UK, USA, Australia, and European countries with V54 Abroad Study Advisors.',
            'seo_keywords' => 'student visa assistance, study visa consulting, overseas education visa',
            'og_title' => 'Student Visa Assistance – V54 Abroad Study Advisors',
            'og_description' => 'Comprehensive student visa guidance for studying abroad.',
            'canonical_url' => 'https://v54abroadstudies.com/services/student-visa'
        ]);

        SeoSetting::create([
            'page_name' => 'Service Detail - Permanent Residency',
            'url_path' => '/services/permanent-residency',
            'seo_title' => 'Permanent Residency Consulting – V54 Abroad Study Advisors',
            'seo_description' => 'Professional migration consultation and guidance for Express Entry, Provincial Nominee Programs (PNP), and other residency pathways.',
            'seo_keywords' => 'permanent residency pathways, migration experts, express entry help',
            'og_title' => 'Permanent Residency Consulting – V54 Abroad Study Advisors',
            'og_description' => 'Professional guidance for PR and Express Entry pathways.',
            'canonical_url' => 'https://v54abroadstudies.com/services/permanent-residency'
        ]);

        SeoSetting::create([
            'page_name' => 'Service Detail - Work Permit',
            'url_path' => '/services/work-permit',
            'seo_title' => 'Work Permit & LMIA Assistance – V54 Abroad Study Advisors',
            'seo_description' => 'Acquire skilled worker visas, LMIA clearances, post-study options, and open work permits for top destinations globally.',
            'seo_keywords' => 'work permit guidance, lmia visa support, skilled worker visa',
            'og_title' => 'Work Permit & LMIA Assistance – V54 Abroad Study Advisors',
            'og_description' => 'Expert work permit guidance for global careers.',
            'canonical_url' => 'https://v54abroadstudies.com/services/work-permit'
        ]);
    }
}
