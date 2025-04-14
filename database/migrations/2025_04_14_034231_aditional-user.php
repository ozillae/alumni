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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('status', [1,2,3])->default(1)->after('remember_token');
            $table->enum('user_type', ["A", "B", "C", "D"])->default("C")->after('status');
            $table->string('phone', 20)->nullable(false)->after('status');
            $table->unsignedBigInteger('member')->nullable()->after('user_type');

            $table->integer('created_by')->nullable()->after('updated_at');
            $table->integer('updated_by')->nullable()->after('created_by');
            $table->text('description')->nullable()->after('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('user_type');
            $table->dropColumn('member');
            $table->dropColumn('phone');
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
            $table->dropColumn('description');
        });
    }
};
