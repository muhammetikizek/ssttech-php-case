<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\ContactInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
            [
                'name'          => 'Taylor',
                'last_name'     => 'Otwell',
                'company'       => 'Laravel',
                'photo'         => 'https://pbs.twimg.com/profile_images/1526762722565709824/avx6Gyol_400x400.jpg',
            ],
            [
                'name'          => 'Jeffrey',
                'last_name'     => 'Way',
                'company'       => 'Laracast',
                'photo'         => 'https://pbs.twimg.com/profile_images/1179539487086514177/cl6UdqIS_400x400.jpg',
            ],
            [
                'name'          => 'Muhammet',
                'last_name'     => 'İkizek',
                'company'       => 'Ssttech',
                'photo'         => 'http://localhost:8000/photo/Kbe6KvGUM6kqf9BPhiS8ZwGxTVmoxGwg8JYG3WAv.jpg',
            ]
        ];

        $locations = [
            'İstanbul/Çekmeköy',
            'İstanbul/Kadıköy',
            'İstanbul/Üsküdar',
        ];
        foreach ($rows as $key => $row) {

            $contact = Contact::create($row);
            ContactInformation::create([
                "contact_uuid"  => $contact->uuid,
                "phone_number"  => '0' . mt_rand(530, 545) . mt_rand(100, 999). mt_rand(10, 99) . mt_rand(10, 99),
                "email_address" => mb_strtolower($row['name']) . '@mail.com',
                "location"      => $locations[$key],
                "content"       => null,
            ]);
        }
    }
}
