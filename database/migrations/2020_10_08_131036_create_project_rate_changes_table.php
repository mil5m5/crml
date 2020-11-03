<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectRateChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_rate_changes', function (Blueprint $table) {
            $table->id();
            $table->double('old_rate');
            $table->double('new_rate');
            $table->string('comment')->nullable();
            $table->integer('created_at');
            $table->integer('updated_at');
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_rate_changes');
    }
}
