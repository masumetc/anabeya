<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('mobile')->nullable();
            $table->string('user_name')->nullable();
            $table->text('checkbook_image')->nullable();
            $table->text('nid_front')->nullable();
            $table->text('nid_back')->nullable();
            $table->string('profile_img')->nullable();
            $table->string('user_type')->nullable();
            $table->string('user_country')->nullable();
            $table->string('user_city')->nullable();
            $table->integer('user_zip')->nullable();
            $table->text('user_address')->nullable();
            $table->string('collect_country')->nullable();
            $table->string('collect_city')->nullable();
            $table->text('collect_address')->nullable();
            $table->integer('collect_zip')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('shipping_city')->nullable();
            $table->integer('shipping_zip')->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
        });

        //Restore data
        if (file_exists(dirname(__FILE__) . '/old_data/CreateUsersTable.tbl')) {
            $data = file_get_contents(dirname(__FILE__) . '/old_data/CreateUsersTable.tbl');
            $data = json_decode($data, true);
            if (is_array($data) && count($data) > 0) {
                $tableData = [];
                foreach ($data as $key => $value) {
                    $tableData [] = $value;
                }
                \Illuminate\Support\Facades\DB::table('users')->insert($tableData);
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
        $data = \Illuminate\Support\Facades\DB::table('users')->get()->toJson();
        file_put_contents(dirname(__FILE__) . '/old_data/CreateUsersTable.tbl', $data);
        
        Schema::dropIfExists('users');
    }
}
