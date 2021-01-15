<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curiers', function (Blueprint $table) {
            $table->bigIncrements('curier_id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('default_link');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
        });

        //Restore data
        if (file_exists(dirname(__FILE__) . '/old_data/CreateCurier.tbl')) {
            $data = file_get_contents(dirname(__FILE__) . '/old_data/CreateCurier.tbl');
            $data = json_decode($data, true);
            if (is_array($data) && count($data) > 0) {
                $tableData = [];
                foreach ($data as $key => $value) {
                    $tableData [] = $value;
                }
                \Illuminate\Support\Facades\DB::table('curiers')->insert($tableData);
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
        $data = \Illuminate\Support\Facades\DB::table('curiers')->get()->toJson();
        file_put_contents(dirname(__FILE__) . '/old_data/CreateCurier.tbl', $data);

        Schema::dropIfExists('curiers');
    }
}
