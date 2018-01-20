<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->primary('id');
            $table->string('username');
            $table->string('password', 255);
            $table->timestamp('last_login');
            $table->timestamps('');
        });

        DB::table('users')->insert([
          array(
            'username' => 'Admin',
            'password' => Hash::make('password')
          )
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
