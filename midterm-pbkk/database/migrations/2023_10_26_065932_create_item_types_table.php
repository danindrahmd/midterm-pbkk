<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTypesTable extends Migration
{
    public function up()
    {
        Schema::create('item_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Isi data awal jika diperlukan
        DB::table('item_types')->insert([
            ['name' => 'Electronics'],
            ['name' => 'Clothing'],
            ['name' => 'Furniture'],
            // ...
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('item_types');
    }
}
