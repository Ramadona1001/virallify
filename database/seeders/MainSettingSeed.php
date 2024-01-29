<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use MainSettings\Models\MainSetting;

class MainSettingSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'logo' => 'logo',
            'favicon' => 'favicon',
            'email' => 'email',
            'mobile' => 'mobile',
            'en' => [
                'name' => 'English Name',
                'meta_title' => 'English Meta Title',
                'meta_content' => 'English Meta Content',
                'meta_keywords' => 'English Meta Keywords',
            ],
            'ar' => [
                'name' => 'Arabic Name',
                'meta_title' => 'Arabic Meta Title',
                'meta_content' => 'Arabic Meta Content',
                'meta_keywords' => 'Arabic Meta Keywords'
            ]
        ];
        MainSetting::create($data);
    }
}
