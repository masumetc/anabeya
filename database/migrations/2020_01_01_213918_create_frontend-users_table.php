<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontendUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_users', function (Blueprint $table) {
            $table->bigIncrements('frontend_user_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('mobile_no')->nullable();
            $table->tinyInteger('gender');
            $table->string('password');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('last_login_lang')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
        });

        //Restore data
        if (file_exists(dirname(__FILE__) . '/old_data/CreateFrontUser.tbl')) {
            $data = file_get_contents(dirname(__FILE__) . '/old_data/CreateFrontUser.tbl');
            $data = json_decode($data, true);
            if (is_array($data) && count($data) > 0) {
                $tableData = [];
                foreach ($data as $key => $value) {
                    $tableData [] = $value;
                }
                \Illuminate\Support\Facades\DB::table('frontend_users')->insert($tableData);
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
        $data = \Illuminate\Support\Facades\DB::table('frontend_users')->get()->toJson();
        file_put_contents(dirname(__FILE__) . '/old_data/CreateFrontUser.tbl', $data);

        Schema::dropIfExists('frontend_users');
    }
}
