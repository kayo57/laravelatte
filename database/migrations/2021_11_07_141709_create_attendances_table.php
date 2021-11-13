<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('user_all');
            $table->string('email',255);
            $table->string('password',255);
            $table->integer('user_id');
            $table->time('start_work');
            $table->time('end_work');
            $table->date('stamp_date');
            $table->time('start_break');
            $table->time('end_break');
            $table->integer('stamp_id');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}