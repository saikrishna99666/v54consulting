<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::truncate();

        Branch::create([
            'name' => 'Head Office',
            'address' => 'V54 Abroad Study Advisors, Plot No 121, PadmaNagar, Beside Maruthi Suzuki Service, Nagarjuna Sagar X Roads towards Birmalaguda, Champapet Rd, Karmanghat, Hyderabad, Telangana, India - 500079.',
            'phone' => '+91 7286847203 / 9490091830',
            'email' => 'info@v54abroadstudies.com / vinayreddy@v54abroadstudies.com',
            'operating_hours' => 'Monday to Saturday : 10:00 AM to 6:30 PM, Sunday : Closed',
            'is_head_office' => true,
            'google_maps_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3809.1171871239846!2d78.52932131487593!3d17.348480988102375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9f7f4577884d%3A0xe54cb8ab8db73041!2sKarmanghat%20X%20Roads!5e0!3m2!1sen!2sin!4v1680000000000!5m2!1sen!2sin'
        ]);

        Branch::create([
            'name' => 'Ameerpet Branch',
            'address' => 'c/o ISRA, Flat 301, Naina Residency, Srinivasa Nagar, Ameerpet, Hyderabad, Telangana 500038.',
            'phone' => '+91 7286847203',
            'email' => 'info@v54abroadstudies.com',
            'operating_hours' => 'Monday to Saturday : 10:00 AM to 6:30 PM, Sunday : Closed',
            'is_head_office' => false,
            'google_maps_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.827223940177!2d78.44186521487747!3d17.436855188050414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb90c37c2295ab%3A0x600dc3cb752be837!2sAmeerpet%2C%20Hyderabad%2C%20Telangana!5e0!3m2!1sen!2sin!4v1680000000000!5m2!1sen!2sin'
        ]);

        Branch::create([
            'name' => 'Begumpet Branch',
            'address' => 'C/O Erics, 1st Floor, Airport Plaza Complex, Prakash Nagar, Begumpet, Hyderabad, Telangana 500016.',
            'phone' => '+91 9490091830',
            'email' => 'info@v54abroadstudies.com',
            'operating_hours' => 'Monday to Saturday : 10:00 AM to 6:30 PM, Sunday : Closed',
            'is_head_office' => false,
            'google_maps_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.634289895101!2d78.46820251487759!3d17.446153788044738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb90a3c27ee98b%3A0x5ef2f349edbcf2be!2sPrakash%20Nagar%2C%20Begumpet%2C%20Hyderabad%2C%20Telangana%20500016!5e0!3m2!1sen!2sin!4v1680000000000!5m2!1sen!2sin'
        ]);

        Branch::create([
            'name' => 'Mangalpally Branch',
            'address' => 'C/O Lakshmi Narasimha Boys Hostel, Beside Sai Baba Temple, Mangalpally X Road, Hyderabad Nagarjuna Sagar Road, Ibrahimpatnam, Rangareddy District, Telangana, 501510.',
            'phone' => '+91 9949868472',
            'email' => 'info@v54abroadstudies.com',
            'operating_hours' => 'Monday to Saturday : 10:00 AM to 6:30 PM, Sunday : Closed',
            'is_head_office' => false,
            'google_maps_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3810.7431267439126!2d78.63660851487479!3d17.207044388194452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcba3ddbb356cb1%3A0xad5fc938fe797fc7!2sMangalpally%20X%20Road!5e0!3m2!1sen!2sin!4v1680000000000!5m2!1sen!2sin'
        ]);

        Branch::create([
            'name' => 'Guntur Branch',
            'address' => 'VIASALYA NAGAR, NEAR BUS STAND, GUNTUR.',
            'phone' => '+91 7286847203',
            'email' => 'info@v54abroadstudies.com',
            'operating_hours' => 'Monday to Saturday : 10:00 AM to 6:30 PM, Sunday : Closed',
            'is_head_office' => false,
            'google_maps_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3829.4187063462943!2d80.43577711486241!3d16.29910408873722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a4a754fc360ab7b%3A0x6bda1dbb60ccf5d4!2sGuntur%20Bus%20Station!5e0!3m2!1sen!2sin!4v1680000000000!5m2!1sen!2sin'
        ]);
    }
}
