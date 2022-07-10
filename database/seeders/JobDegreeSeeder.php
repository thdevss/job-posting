<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobDegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('job_degree')->insert([
            'name' => 'ไม่ระบุ',
        ]);
        DB::table('job_degree')->insert([
            'name' => 'ม.3',
        ]);
        DB::table('job_degree')->insert([
            'name' => 'ม.6 / ปวช.',
        ]);
        DB::table('job_degree')->insert([
            'name' => 'ปวส. / อนุปริญญา',
        ]);
        DB::table('job_degree')->insert([
            'name' => 'ปริญญาตรี',
        ]);
        DB::table('job_degree')->insert([
            'name' => 'ปริญญาโท',
        ]);
    }
}
