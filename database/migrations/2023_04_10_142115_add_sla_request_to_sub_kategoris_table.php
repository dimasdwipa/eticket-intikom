<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlaRequestToSubKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_kategoris', function (Blueprint $table) {
            $table->integer('extend_response_SLA_default')->default(30);
            $table->integer('extend_ticket_SLA_default')->default(60);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_kategoris', function (Blueprint $table) {
            $table->dropColumn('extend_response_SLA_default');
            $table->dropColumn('extend_ticket_SLA_default');
        });
    }
}
