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
            $table->string('name');
            $table->integer('salary_type');
            $table->double('salary_rate');
            $table->integer('finished_at');
            $table->integer('paused_at');
            $table->integer('status');
            $table->timestamps();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->foreignId('currency_id')->constrained();
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
