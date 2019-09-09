<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditOpuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opuses', function (Blueprint $table) {
			$table->bigIncrements('id')->change();
			$table->dropColumn(['title', 'text']);
			$table->text('page');
			$table->unsignedInteger('number_page');
			$table->unsignedBigInteger('title_id');
			$table->unsignedBigInteger('user_id');
			$table->foreign('title_id')->references('id')->on('titles');
			$table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opuses', function (Blueprint $table) {
            //
        });
    }
}
