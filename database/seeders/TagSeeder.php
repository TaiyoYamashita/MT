<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('tags')->insert([ 'tag' => 'メール' ]);
        DB::table('tags')->insert([ 'tag' => 'ライン' ]);
        DB::table('tags')->insert([ 'tag' => '挨拶' ]);
        DB::table('tags')->insert([ 'tag' => 'お願い' ]);
        DB::table('tags')->insert([ 'tag' => 'お礼' ]);
        DB::table('tags')->insert([ 'tag' => '催促' ]);
        DB::table('tags')->insert([ 'tag' => '断り' ]);
        DB::table('tags')->insert([ 'tag' => '宣伝' ]);
        DB::table('tags')->insert([ 'tag' => '上司に対する文章' ]);
        DB::table('tags')->insert([ 'tag' => 'ガクチカ' ]);
        DB::table('tags')->insert([ 'tag' => '自己PR' ]);
        DB::table('tags')->insert([ 'tag' => '企業に対しての文章' ]);
        DB::table('tags')->insert([ 'tag' => 'その他' ]);
    }
}
