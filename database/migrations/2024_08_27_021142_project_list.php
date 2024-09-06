<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_list', function (Blueprint $table) {
            $table->id();
            $table->string('status', 100)->nullable();
            $table->string('project_number', 100)->nullable();
            $table->string('project_name')->nullable();
            $table->string('project_manager', 100)->nullable();
            $table->string('project_location', 100)->nullable();
            $table->string('client', 100)->nullable();
            $table->date('project_start')->nullable();
            $table->date('project_finish')->nullable();
            $table->string('project_picture', 100)->nullable();
            $table->text('sector')->nullable();
            $table->text('service')->nullable();
            $table->text('project_description')->nullable();
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
        //
    }
}
