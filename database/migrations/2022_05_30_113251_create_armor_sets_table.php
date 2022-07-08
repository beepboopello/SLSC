<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\ArmorSetsController;

class CreateArmorSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armor_sets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('price');
            $table->string('name');
            $table->string('description');
            $table->string('url');
        });
        ArmorSetsController::ArmorSets_Init();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('armor_sets');
    }
}
