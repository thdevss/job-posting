<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('job_type')->insert([
            'name' => 'งานประจำ',
        ]);
        DB::table('job_type')->insert([
            'name' => 'งานพาร์ทไทม์',
        ]);
        DB::table('job_type')->insert([
            'name' => 'นักศึกษาฝึกงาน',
        ]);
        DB::table('job_type')->insert([
            'name' => 'งานรายวัน',
        ]);
        DB::table('job_type')->insert([
            'name' => 'งานกำหนดระยะเวลา',
        ]);
        DB::table('job_type')->insert([
            'name' => 'งานหน่วยงานราชการ/รัฐวิสาหกิจ',
        ]);
        DB::table('job_type')->insert([
            'name' => 'อื่น ๆ ',
        ]);
    }
}
