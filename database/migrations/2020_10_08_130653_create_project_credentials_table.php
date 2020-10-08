<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_credentials', function (Blueprint $table) {
            $table->id();
            $table->text('value');
            $table->timestamps();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('credential_type_id')->constrained('project_credential_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_credentials');
    }
}