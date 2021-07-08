<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsYearWeekSprintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sprints', function (Blueprint $table) {
            $table->string('year', 4);
            $table->string('week', 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sprints', function (Blueprint $table) {
            $table->dropColumn('year');
            $table->dropColumn('week');
        });
    }
}