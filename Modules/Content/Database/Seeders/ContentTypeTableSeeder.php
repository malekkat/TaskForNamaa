<?php

namespace Modules\Content\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Content\Entities\contentType;

class ContentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('content_type_table')->insert([
            'content_type' => 'Sport'
        ]);
        DB::table('content_type_table')->insert([
            'content_type' => 'News'
        ]);
        //$this->call("ContentTypeTableSeeder");

    }
}
