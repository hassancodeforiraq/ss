<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('many');
            $table->string('photo');
            $table->string('product_id');
            $table->softDeletes(); // Soft Delete
            $table->string('slug'); // Slug
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
        Schema::dropIfExists('materals');
    }
}
