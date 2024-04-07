<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSalesAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('customer')->nullable();
            $table->string('no_CRM')->nullable();
            $table->string('sales_admin')->nullable();
            $table->integer('quot_itk')->nullable()->default(0);
            $table->integer('po_customer')->nullable()->default(0);
            $table->integer('po_suplayer')->nullable()->default(0);
            $table->integer('cost_sheet')->nullable()->default(0);
            $table->string('multi_files')->nullable()->default(0);
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
            $table->dropColumn('customer');
            $table->dropColumn('no_CRM');
            $table->dropColumn('sales_admin');
            $table->dropColumn('quot_itk');
            $table->dropColumn('po_customer');
            $table->dropColumn('po_suplayer');
            $table->dropColumn('cost_sheet');
            $table->dropColumn('multi_files');
        });
    }
}
