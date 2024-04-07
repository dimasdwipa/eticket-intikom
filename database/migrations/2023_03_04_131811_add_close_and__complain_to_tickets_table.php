<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCloseAndComplainToTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->text('solution')->nullable();
            $table->text('note')->nullable();
            $table->text('comment_requestor')->nullable();
            $table->text('rating')->nullable();

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
            $table->dropColumn('solution');
            $table->dropColumn('note');
            $table->dropColumn('comment_requestor');
            $table->dropColumn('rating');
        });
    }
}
