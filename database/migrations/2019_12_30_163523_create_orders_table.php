<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->integer('product_id')->unsigned();
            $table->integer('cart_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('seller_id')->unsigned();
            $table->integer('curier_id')->unsigned();
            $table->integer('tracking_id')->unsigned();
            $table->text('tracking_link');
            $table->integer('cupon_id')->unsigned();
            $table->integer('total_price')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->integer('getway_id')->unsigned();
            $table->string('order_status');
            $table->text('note');
            $table->timestamps();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
        });

        //Restore data
        if (file_exists(dirname(__FILE__) . '/old_data/CreateOrder.tbl')) {
            $data = file_get_contents(dirname(__FILE__) . '/old_data/CreateOrder.tbl');
            $data = json_decode($data, true);
            if (is_array($data) && count($data) > 0) {
                $tableData = [];
                foreach ($data as $key => $value) {
                    $tableData [] = $value;
                }
                \Illuminate\Support\Facades\DB::table('orders')->insert($tableData);
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
        $data = \Illuminate\Support\Facades\DB::table('orders')->get()->toJson();
        file_put_contents(dirname(__FILE__) . '/old_data/CreateOrder.tbl', $data);

        Schema::dropIfExists('orders');
    }
}
