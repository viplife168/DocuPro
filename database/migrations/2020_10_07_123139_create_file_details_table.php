<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_details', function (Blueprint $table) {
            $table->id();
            $table->morphs('reservation');
            $table->bigInteger('file_user_id');
            $table->string('file_number');
            $table->dateTime('res_collect_date');
            $table->dateTime('res_return_date');
            $table->integer('res_renew_count')->nullable();
            $table->string('file_status')->nullable();
            $table->string('file_notes')->nullable();
            $table->string('incharge_officer')->nullable();
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
        Schema::dropIfExists('file_details');
    }
}
