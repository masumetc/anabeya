<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_charts', function (Blueprint $table) {
            $table->bigIncrements('price_chart_id');
            $table->integer('product_id')->unsigned();
            $table->string('color');
            $table->text('color_image');
            $table->string('size');
            $table->integer('stock')->unsigned();
            $table->integer('regular_price')->unsigned();
            $table->integer('discount_price')->unsigned();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
        });

        //Restore data
        if (file_exists(dirname(__FILE__) . '/old_data/CreatePriceChart.tbl')) {
            $data = file_get_contents(dirname(__FILE__) . '/old_data/CreatePriceChart.tbl');
            $data = json_decode($data, true);
            if (is_array($data) && count($data) > 0) {
                $tableData = [];
                foreach ($data as $key => $value) {
                    $tableData [] = $value;
                }
                \Illuminate\Support\Facades\DB::table('price_charts')->insert($tableData);
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
        $data = \Illuminate\Support\Facades\DB::table('price_charts')->get()->toJson();
        file_put_contents(dirname(__FILE__) . '/old_data/CreatePriceChart.tbl', $data);

        Schema::dropIfExists('price_charts');
    }
}
