<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spps', function (Blueprint $table) {
            $table->id();
            $table->string('file_number');
            $table->string('ic_number');
            $table->string('name');
            $table->string('location')->nullable();
            $table->string('status')->nullable();
            $table->string('notes')->nullable();
            $table->string('storage')->nullable();
            $table->string('last_person_in_charge')->nullable();
            $table->string('last_person_borrow')->nullable();
            $table->string('last_deparment_borrow')->nullable();
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
        Schema::dropIfExists('spps');
    }
}
