<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('tag_asset')->unique();
            $table->string('nama_item');
            $table->text('deskripsi')->nullable();
            $table->string('merek')->nullable();
            $table->string('model_type')->nullable();
            $table->string('condition_asset')->nullable();
            $table->string('status')->default('Available');
            $table->unsignedInteger('agent_id');
            $table->unsignedInteger('supervisor_id');
            $table->string('asset_custodian');
            $table->string('image')->nullable();
            $table->unsignedInteger('team_id')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
