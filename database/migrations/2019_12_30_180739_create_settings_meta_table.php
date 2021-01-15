<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_meta', function (Blueprint $table) {
           $table->bigIncrements('settings_meta_id');
            $table->integer('settings_id');
            $table->text('meta_content');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
        });

        //Restore data
        if (file_exists(dirname(__FILE__) . '/old_data/CreateAettingsMeta.tbl')) {
            $data = file_get_contents(dirname(__FILE__) . '/old_data/CreateAettingsMeta.tbl');
            $data = json_decode($data, true);
            if (is_array($data) && count($data) > 0) {
                $tableData = [];
                foreach ($data as $key => $value) {
                    $tableData [] = $value;
                }
                \Illuminate\Support\Facades\DB::table('settings_meta')->insert($tableData);
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
        $data = \Illuminate\Support\Facades\DB::table('settings_meta')->get()->toJson();
        file_put_contents(dirname(__FILE__) . '/old_data/CreateAettingsMeta.tbl', $data);

        Schema::dropIfExists('settings_meta');
    }
}
