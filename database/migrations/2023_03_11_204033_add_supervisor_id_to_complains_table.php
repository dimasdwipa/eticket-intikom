<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSupervisorIdToComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complains', function (Blueprint $table) {
            $table->foreignId('supervisor_id')->nullable();
            $table->timestamp('sla_request')->nullable();
            $table->timestamp('sla_request_end')->nullable();
            $table->string('approve')->nullable()->default('await');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complains', function (Blueprint $table) {
            $table->dropColumn('supervisor_id');
            $table->dropColumn('sla_request');
            $table->dropColumn('sla_request_end');
            $table->dropColumn('approve');
        });
    }
}
