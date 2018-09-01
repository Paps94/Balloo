<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
          $table->increments('id');
          $table->string('Type');
          $table->string('Condition');
          $table->text('Description');
          $table->integer('NumberOfBedrooms');
          $table->integer('NumberOfBathrooms');
          $table->integer('NumberOfKitchens');
          $table->integer('Landline')->nullable();
          $table->string('Address');
          $table->string('PostalCode');
          $table->string('Region');
          $table->string('City');
          $table->string('Country');
          $table->integer('PricePerWeek');

          //Set up of foreign keys from other tables
          $table->integer('user_id')->unsigned()->nullable();      //Reason is because a contract has to belong to a user
          $table->timestamps();
        });

        Schema::table('properties', function($table) {
            $table->foreign('user_id')->references('id')->on('users'); //Link the "user_id" of this table to that of "id" on the 'Users' table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
