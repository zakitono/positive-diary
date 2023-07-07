<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diaries')->insert([
            'id' => 1,
            'date' => '2023-01-01',
            'note' => '天気が良くて気持ち良かった。',
            'note01' => '美味しいご飯を食べれた。',
            'note02' => '朝起きれた。',
            'created_at' => '2023/01/01 11:11:11',
            'user_id' => 1
        ]);
    }
}
