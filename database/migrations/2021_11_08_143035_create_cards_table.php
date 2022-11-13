<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->text('token');
            $table->string('code');
            $table->unsignedBigInteger('client_id')->index()->nullable();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('subcategory_id')->index();
            $table->unsignedBigInteger('admin_id')->index()->nullable();
            $table->unsignedBigInteger('manger_id')->index()->nullable();
            $table->unsignedBigInteger('origin_id')->index();
            $table->tinyInteger('status')->default(0)->comment('status of card');
            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('manger_id')->references('id')->on('admins')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('origin_id')->references('id')->on('origins')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
