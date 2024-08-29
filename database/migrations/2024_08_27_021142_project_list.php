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
            $table->string('status',100);
          
            $table->string('project_number',100);
            $table->string('project_name');
            $table->string('project_manager',100);
            $table->string('project_location',100);
            $table->string('client',100);
            $table->date('project_start');
            $table->date('project_finish');
            $table->string('project_picture',100);
            $table->text('sector');
            $table->text('service');
            $table->text('project_description');
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
