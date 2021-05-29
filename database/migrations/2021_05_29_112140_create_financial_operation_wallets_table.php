<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialOperationWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_operation_wallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_wallet_id')->index();
            $table->morphs('payable', 'payee_index');
            $table->double('value_transferred');
            $table->double('balance_payer');
            $table->double('balance_payee');

            $table
                ->foreign('customer_wallet_id')
                ->references('id')
                ->on('customer_wallets');

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
        Schema::dropIfExists('financial_operation_wallets');
    }
}
