<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAddressUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('address_user')) {
            Schema::table('address_user', function (Blueprint $table) {
                $table->dropForeign(['address_id']);
                $table->foreign('address_id')
                    ->references('id')
                    ->on('addresses');
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
        if (Schema::hasTable('address_user')) {
            Schema::table('address_user', function (Blueprint $table) {
                $table->dropForeign(['address_id']);
                $table->foreign('address_id')
                    ->references('id')
                    ->on('addresses')
                    ->onDelete('cascade');
            });
        }
    }
}
