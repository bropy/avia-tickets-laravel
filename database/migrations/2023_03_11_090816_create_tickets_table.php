<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('depcountry');
            $table->string('depcity');
            $table->string('depairport');
            $table->string('depairportcode');
            $table->string('depdate');
            $table->string('arrcountry');
            $table->string('arrcity');
            $table->string('arrairport');
            $table->string('arrairportcode');
            $table->string('passangername');
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
        Schema::dropIfExists('tickets');
    }
}
