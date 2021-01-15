<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
             $table->bigIncrements('product_id');
             $table->integer('category_id')->unsigned();
             $table->integer('brand_id')->unsigned();
             $table->integer('seller_id')->unsigned();
             $table->string('title');
             $table->text('what_in_box');
             $table->integer('weight')->unsigned();
             $table->integer('cm')->unsigned();
             $table->integer('curier_unit')->unsigned();
             $table->text('description');
             $table->text('slug');
             $table->string('status');
             $table->string('cupon_check');
             $table->integer('created_by')->unsigned();
             $table->integer('updated_by')->unsigned()->nullable();
             $table->timestamps();
        });

        //Restore data
        if (file_exists(dirname(__FILE__) . '/old_data/CreateProducts.tbl')) {
            $data = file_get_contents(dirname(__FILE__) . '/old_data/CreateProducts.tbl');
            $data = json_decode($data, true);
            if (is_array($data) && count($data) > 0) {
                $tableData = [];
                foreach ($data as $key => $value) {
                    $tableData [] = $value;
                }
                \Illuminate\Support\Facades\DB::table('products')->insert($tableData);
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
        $data = \Illuminate\Support\Facades\DB::table('categories')->get()->toJson();
        file_put_contents(dirname(__FILE__) . '/old_data/CreateCategories.tbl', $data);

        Schema::dropIfExists('products');
    }
}
