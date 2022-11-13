<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('category_id')->comment('card-tag-etc..');
            $table->unsignedBigInteger('card_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('industrie_id')->nullable();
            $table->string('type')->comment('child- animal - adult');
            $table->string('code')->unique()->index();
            $table->string('prefix')->nullable();
            $table->string('first_name')->index();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('nike_name')->nullable();
            $table->string('mobile')->nullable();
            $table->date('birthday')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('school_address')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('animal_type')->nullable();
            $table->string('avatar')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('home_address')->nullable();
            $table->string('owner_mobile')->nullable();
            $table->string('organization')->nullable();
            $table->string('organization_url')->nullable();
            $table->string('organization_address')->nullable();
            $table->string('role')->nullable();
            $table->string('work_email')->nullable();
            $table->string('work_mobile')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('fax')->nullable();
            $table->boolean('display_links')->default(true)->comment('1 is display - 0 is not display');
            $table->json('display_fields')->nullable();
            $table->boolean('is_default')->default(false)->comment('1 is default - 0 is not default');
            $table->tinyInteger('status')->default(0)->comment('1 is VISIBLE - 0 is HIDING');
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
        Schema::dropIfExists('profiles');
    }
}
