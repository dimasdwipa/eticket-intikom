<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBasicInfoToTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('departemen_corporate')->nullable();
            $table->string('position_corporate')->nullable();
            $table->string('role')->default('user');
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
            $table->dropColumn('last_name');
            $table->dropColumn('location');
            $table->dropColumn('phone');
            $table->dropColumn('departemen_corporate');
            $table->dropColumn('position_corporate');
            $table->dropColumn('role');
        });
    }
}
