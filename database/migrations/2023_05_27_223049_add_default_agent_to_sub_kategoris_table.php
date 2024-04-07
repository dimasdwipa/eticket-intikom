<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultAgentToSubKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_kategoris', function (Blueprint $table) {
            $table->integer('agent_id')->nullable();
            $table->integer('supervisor_id')->nullable();
            $table->integer('send_assignment_default')->nullable()->default(30);
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
            $table->dropColumn('agent_id');
            $table->dropColumn('supervisor_id');
            $table->dropColumn('send_assignment_default');
        });
    }
}
