<?php

use Illuminate\Support\Str;
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
            $table->id();
            $table->tinyInteger('type')->default(1)->comment('1 client - 2 admin');
            $table->uuid('uuid');
            $table->string('code')->unique()->index();
            $table->string('full_name')->index();
            $table->string('email');
            $table->string('mobile')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->string('cover')->nullable();
            $table->text('remember_token')->nullable();
            $table->text('device_token')->nullable();
            $table->text('facebook_token')->nullable();
            $table->text('google_token')->nullable();
            $table->date('block_date')->nullable()->comment('Block date until');
            $table->boolean('suspend')->default(false)->comment('0 is active - 1 is block');
            $table->boolean('status')->default(false)->comment('1 is verify - 0 is not verify');
            $table->timestamps();
        });
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
