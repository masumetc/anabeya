<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('transaction_id');
            $table->integer('getway_id')->unsigned();
            $table->integer('payment_id')->unsigned();
            $table->integer('seller_id')->unsigned();
            $table->integer('curier_id')->unsigned();
            $table->string('reference');
            $table->string('type');
            $table->string('status');
            $table->timestamps();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
        });

        //Restore data
        if (file_exists(dirname(__FILE__) . '/old_data/CreateTransaction.tbl')) {
            $data = file_get_contents(dirname(__FILE__) . '/old_data/CreateTransaction.tbl');
            $data = json_decode($data, true);
            if (is_array($data) && count($data) > 0) {
                $tableData = [];
                foreach ($data as $key => $value) {
                    $tableData [] = $value;
                }
                \Illuminate\Support\Facades\DB::table('transactions')->insert($tableData);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Backup Data
        $data = \Illuminate\Support\Facades\DB::table('transactions')->get()->toJson();
        file_put_contents(dirname(__FILE__) . '/old_data/CreateTransaction.tbl', $data);

        Schema::dropIfExists('transactions');
    }
}
