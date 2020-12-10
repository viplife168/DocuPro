<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_number');
            $table->bigInteger('user_id');
            $table->bigInteger('receipient_id');
            $table->dateTime('date_apply');
            $table->string('status');
            $table->string('notes');
            $table->morphs('transfer');
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
        Schema::dropIfExists('transfer_files');
    }
}
