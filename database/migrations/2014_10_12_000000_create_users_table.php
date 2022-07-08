<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('tel')->default('N/A');
            $table->integer('souls')->default(0);
            $table->integer('soul_memory')->default(0);
            $table->integer('currentSet')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('description')->default('');
            $table->string('alias')->default('');
            $table->rememberToken();
            $table->timestamps();
        });
        User::create([
            'name' => 'Đinh Đức Khang',
            'email' => 'ainchasetema@gmail.com',
            'password' => Hash::make('khang2001'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
