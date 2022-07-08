<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Place;
use App\Http\Controllers\PlaceController;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('endpoint');
            $table->string('description');
            $table->string('icon');
            $table->string('bg');
        });
        PlaceController::Places_Init();
        // $firelink = new Place;
        // $firelink->name = 'Firelink Shrine';
        // $firelink->endpoint = 'firelink';
        // $firelink->description = 'None';
        // $firelink->icon = "/assets/images/firelink_icon.gif";
        // $firelink->bg = "/assets/images/firelink_bg.gif";
        // $firelink->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
