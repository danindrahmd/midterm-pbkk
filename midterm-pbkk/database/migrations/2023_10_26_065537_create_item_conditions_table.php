<?php

// database/migrations/xxxx_xx_xx_create_item_conditions_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemConditionsTable extends Migration
{
    public function up()
    {
        Schema::create('item_conditions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Isi data awal jika diperlukan
        DB::table('item_conditions')->insert([
            ['name' => 'New'],
            ['name' => 'Used'],
            ['name' => 'Refurbished'],
            // ...
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('item_conditions');
    }
}
