<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains', function (Blueprint $table) {
            $table->id();
            $table->string('caption');
            $table->string('location');
            $table->string('image');
            $table->string('read')->default(0);
            $table->string('user_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('complains');
    }
}
