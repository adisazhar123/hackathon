<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_item', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->integer('quantity');
            $table->float('percentage');
            $table->unsignedInteger('campaign_id');
            $table->unsignedInteger('item_id');
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
        Schema::dropIfExists('campaign_items');
    }
}
