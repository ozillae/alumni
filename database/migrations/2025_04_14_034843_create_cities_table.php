<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 10)->nullable(false);
            $table->string('name', 150)->nullable(false);
            $table->string('province', 10)->nullable(false);
            $table->foreign('province')->references('code')->on('provinces');
            $table->boolean('active')->default(1);
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->dateTime('created_at', $precision = 0);
            $table->dateTime('updated_at', $precision = 0);
            $table->integer('deleted_by')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
};
