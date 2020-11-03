<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcomes', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('notes')->nullable();
            $table->integer('is_paid')->default(1);
            $table->integer('paid_at')->nullable();
            $table->integer('date');
            $table->double('amount');
            $table->integer('created_at');
            $table->integer('updated_at');
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
        Schema::dropIfExists('outcomes');
    }
}
