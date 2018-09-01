<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('contracts', function (Blueprint $table) {
             $table->increments('id');
             $table->date('StartDate');
             $table->date('EndDate');
             $table->integer('PricePerWeek');
             $table->integer('NumberOfTenats');
             $table->string('ContractLength');
             $table->boolean('BillsIncluded')->default(0);
             $table->integer('Deposit');

             //Set up of foreign keys from other tables
             $table->integer('user_id')->unsigned()->nullable();      //Reason is because a contract has to belong to a user
             $table->integer('property_id')->unsigned()->nullable();  //Reason is because a contract has to belong to a property

             $table->timestamps();
         });

         Schema::table('contracts', function($table) {
             $table->foreign('user_id')->references('id')->on('users'); //Link the "user_id" of this table to that of "id" on the 'Users' table
         });

         Schema::table('contracts', function($table) {
             $table->foreign('property_id')->references('id')->on('properties'); //Link the "property_id" of this table to that of "id" on the 'Properties' table
         });
     }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
