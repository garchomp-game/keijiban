<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        $profiles = factory(Profile::class)->times(50)->make()->each(function ($profile, $index) {
            if ($index == 0) {
                // $profile->field = 'value';
            }
        });

        Profile::insert($profiles->toArray());
    }

}

