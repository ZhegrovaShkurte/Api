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
        Schema::create('wages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->decimal('active_salary');
            $table->decimal('previous_salary');
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
        Schema::table('wages', function($table) {
            $table->dropForeign('user_id');
            $table->dropColumn('active_salary');
            $table->dropColumn('previous_salary');
    });
}
};
