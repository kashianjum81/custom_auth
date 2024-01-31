<?php

namespace Database\Seeders;

use App\Models\Websetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
              Websetting::create([
            'logo'=> 'images/logos/dark-logo.svg',
            'webtitle'=>'modernizee free',
            'footer'=> 'Design and Developed by AdminMart.com Distributed by ThemeWagon',
            'favcon'=> 'images/favcon/louis-hansel-fEI_E0NsyD8-unsplash.jpg',
            
        ]);
    }
}
