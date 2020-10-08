<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('skype');
            $table->string('email');
            $table->string('telegram');
            $table->string('whatsapp');
            $table->string('phone');
            $table->integer('status');
            $table->integer('paused_at');
            $table->integer('finished_at');
            $table->timestamps();
            $table->foreignId('client_source_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
