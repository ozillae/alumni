<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 20)->nullable(false);
            $table->string('name', 150)->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('phone', 16)->nullable(false);
            $table->string('email', 100)->nullable(false);
            $table->string('title_front', 100)->nullable();
            $table->string('title_back', 100)->nullable();
            $table->string('file_profil', 150)->nullable();

            $table->string('province', 10)->nullable(false);
            $table->unsignedBigInteger('city')->nullable(false);
            $table->unsignedBigInteger('division')->nullable(false);
            $table->foreign('province')->references('code')->on('provinces');
            $table->foreign('city')->references('id')->on('cities');
            $table->foreign('division')->references('id')->on('divisions');
            
            $table->boolean('publish_phone')->default(false);
            $table->enum('status', [1,2,3,4])->default(1);
            $table->date('joint_date');
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
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
