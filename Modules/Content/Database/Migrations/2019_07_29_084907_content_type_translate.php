<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContentTypeTranslate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_type_translate',function (Blueprint $table){
            $table->bigInteger('id');
            $table->integer('content_type_id')->unsigned();

            $table->string('locale')->index();
            $table->string('type');

            $table->unique(['content_type_id','locale']);
            $table->foreign('content_type_id')
                ->references('id')->on('content_type_table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_type_translate');
    }
}
