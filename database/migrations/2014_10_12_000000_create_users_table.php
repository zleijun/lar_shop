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
        if(!Schema::hasTable('users')){
            //不存在创建
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->comment('姓名');
                $table->string('email')->unique();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }else{
            Schema::table('users', function (Blueprint $table) {
                //检测字段是否存在,不存在则创建
                if(!Schema::hasColumn('users','email_verified')){
                    $table->boolean('email_verified')->default(false)->after('remember_token');
                }
            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
