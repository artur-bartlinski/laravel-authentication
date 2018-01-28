<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('name');
                $table->string('forename')->nullable();
                $table->integer('title_id')->unsigned()->nullable();
                $table->string('surname')->nullable();
                $table->date('dob')->nullable();
                $table->integer('gender_id')->unsigned()->nullable();
                $table->foreign('title_id')
                    ->references('id')
                    ->on('titles');
                $table->foreign('gender_id')
                    ->references('id')
                    ->on('genders');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('name');
                $table->dropColumn([
                    'title_id',
                    'forename',
                    'surname',
                    'dob',
                    'gender_id'
                ]);
                $table->dropForeign('title_id');
                $table->dropForeign('gender_id');
            });
        }
    }
}
