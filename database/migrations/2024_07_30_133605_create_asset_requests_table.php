<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_requests', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->unsignedBigInteger('lokasi_id');
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('asset_id');
            $table->string('transaction_type');
            $table->date('transaction_date');
            $table->date('resolution_date');
            $table->string('type_request');
            $table->date('est_return_date')->nullable();
            $table->date('request_return_date')->nullable();
            $table->date('return_date')->nullable();
            $table->string('asset_custodian')->nullable();
            $table->string('priority');
            $table->string('files')->nullable();
            $table->string('description');
            $table->string('note_agent');
            $table->unsignedInteger('team_id');
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
        Schema::dropIfExists('asset_requests');
    }
}
