<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->foreignId('lokasi_id');
            $table->foreignId('katagori_id');
            $table->foreignId('sub_katagori_id');
            $table->foreignId('supervisor_id')->nullable();
            $table->foreignId('agent_id')->nullable();
            $table->foreignId('user_id');
            $table->date('tanggal');
            $table->text('problem');
            $table->string('state')->default('Request Feedback');
            $table->string('status')->default('Open');
            $table->string('prioritas')->default('normal');
            $table->string('estimation_date')->nullable();
            $table->string('resolved_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
