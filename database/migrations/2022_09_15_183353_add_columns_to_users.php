<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'first_name');
            $table->string('last_name', 50)->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', [ 'Male', 'Female' ])->nullable();
            $table->double('annual_income', 8, 2)->nullable();
            $table->string('occupation', 30)->nullable();
            $table->string('family_type', 30)->nullable();
            $table->enum('manglik', [ 'Yes', 'No' ])->nullable();
            $table->string('google_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('first_name', 'name');
            $table->dropColumn('last_name');
            $table->dropColumn('dob');
            $table->dropColumn('gender');
            $table->dropColumn('annual_income');
            $table->dropColumn('occupation');
            $table->dropColumn('family_type');
            $table->dropColumn('manglik');
            $table->dropColumn('google_id');
        });
    }
};
