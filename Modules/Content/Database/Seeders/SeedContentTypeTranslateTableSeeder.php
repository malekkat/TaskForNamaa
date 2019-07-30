<?php

namespace Modules\Content\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeedContentTypeTranslateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('content_type_translate')->insert([
            'id'=>1,
            'content_type_id' => '1',
            'locale'=>'en',
            'type'=>'Sport'
        ]);
        DB::table('content_type_translate')->insert([
            'id'=>2,
            'content_type_id' => '1',
            'locale'=>'ar',
            'type'=>'الرياضة'
        ]);
        DB::table('content_type_translate')->insert([
            'id'=>3,
            'content_type_id' => '2',
            'locale'=>'en',
            'type'=>'News'
        ]);
        DB::table('content_type_translate')->insert([
            'id'=>4,
            'content_type_id' => '2',
            'locale'=>'ar',
            'type'=>'أخبار'
        ]);

        // $this->call("OthersTableSeeder");
    }
}
