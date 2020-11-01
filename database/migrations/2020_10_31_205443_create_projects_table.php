<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->string('engineer_id')->nullable(true);
            $table->string('contractor_id')->nullable(true);
            $table->date('starting_date');
            $table->string('project_span');
            $table->string('location');
            $table->date('date_finished')->nullable(true);
            $table->string('progress')->default('0');
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
        Schema::dropIfExists('projects');
    }
}
