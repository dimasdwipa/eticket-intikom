<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlaToTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('bu')->nullable();
            $table->integer('sla_ticket_time')->default(60);
            $table->timestamp('sla_assignment')->nullable();
            $table->timestamp('sla_respone')->nullable();
            $table->timestamp('sla_repair')->nullable();
            $table->timestamp('sla_repair_end')->nullable();
            $table->timestamp('sla_pending')->nullable();
            $table->timestamp('sla_pending_end')->nullable();
            $table->timestamp('sla_resolved')->nullable();
            $table->timestamp('sla_close')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('bu');
            $table->dropColumn('sla_ticket_time');
            $table->dropColumn('sla_assignment');
            $table->dropColumn('sla_respone');
            $table->dropColumn('sla_repair');
            $table->dropColumn('sla_repair_end');
            $table->dropColumn('sla_pending');
            $table->dropColumn('sla_pending_end');
            $table->dropColumn('sla_resolved');
            $table->dropColumn('sla_close');
        });
    }
}
