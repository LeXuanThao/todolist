<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('name');
		    $table->text('description');
	    	$table->unsignedInteger('created_by');
		    $table->unsignedInteger('assign_to');
		    $table->dateTime('deadline');
		    $table->unsignedTinyInteger('priority');
    		$table->unsignedInteger('status');
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
        Schema::dropIfExists('tasks');
    }
}
