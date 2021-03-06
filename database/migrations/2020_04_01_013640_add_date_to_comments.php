<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateToComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //add column 'date' to 'comments'
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('date');
        });
    }
}
