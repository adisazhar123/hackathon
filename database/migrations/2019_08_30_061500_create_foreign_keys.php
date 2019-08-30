<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->foreign('users_id')
                ->references('id')
                ->on('users');
        });

        Schema::table('campaign_item', function (Blueprint $table) {
           $table->foreign('campaigns_id')
               ->references('id')
               ->on('campaigns');

           $table->foreign('items_id')
               ->references('id')
               ->on('items');
        });

        Schema::table('contributions', function (Blueprint $table) {
           $table->foreign('campaigns_id')
           ->references('id')
           ->on('campaigns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_keys');
    }
}
