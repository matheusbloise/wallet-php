<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopkeeperWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopkeeper_wallets', function (Blueprint $table) {
            $table->id();
            $table->double('balance')->nullable();
            $table->unsignedBigInteger('shopkeeper_id')->index();

            $table
                ->foreign('shopkeeper_id')
                ->references('id')
                ->on('shopkeepers');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopkeeper_wallets');
    }
}
