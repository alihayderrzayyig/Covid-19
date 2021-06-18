<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Database\Seeder;

class addGovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gov1 = Governorate::create([
            'name'=>'أربيل'
        ]);

        $gov2 = Governorate::create([
            'name'=>'الأنبار'
        ]);


        $gov3 = Governorate::create([
            'name'=>'بابل'
        ]);


        $gov4 = Governorate::create([
            'name'=>'بغداد'
        ]);


        $gov5 = Governorate::create([
            'name'=>'البصرة'
        ]);


        $gov6 = Governorate::create([
            'name'=>'حلبجة'
        ]);

        $gov7 = Governorate::create([
            'name'=>'دهوك'
        ]);
        $gov8 = Governorate::create([
            'name'=>'القادسية'
        ]);

        $gov9 = Governorate::create([
            'name'=>'ديالى'
        ]);

        $gov10 = Governorate::create([
            'name'=>'ذي قار'
        ]);

        $gov11 = Governorate::create([
            'name'=>'السليمانية'
        ]);

        $gov12 = Governorate::create([
            'name'=>'صلاح الدين'
        ]);

        $gov13 = Governorate::create([
            'name'=>'كركوك'
        ]);

        $gov14 = Governorate::create([
            'name'=>'كربلاء'
        ]);

        $gov15 = Governorate::create([
            'name'=>'المثنى'
        ]);

        $gov16 = Governorate::create([
            'name'=>'ميسان'
        ]);

        $gov17 = Governorate::create([
            'name'=>'النجف'
        ]);

        $gov18 = Governorate::create([
            'name'=>'نينوى'
        ]);

        $gov19 = Governorate::create([
            'name'=>'واسط'
        ]);

    }
}
