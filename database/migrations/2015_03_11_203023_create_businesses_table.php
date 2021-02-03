<?php

/**
 * Antvel - Data Base
 * Businesses Table.
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->primary();
            $table->string('business_name',50);//店铺名称
            $table->string('person',50);//店铺负责人
            $table->string('range',255)->nullable();//经营范围
            $table->string('dpphoto',255)->nullable();//商标
            $table->string('logo',255)->nullable();//logo
            $table->text('lbpic')->nullable();//轮播图
            $table->string('address',255)->nullable();//地址
            $table->string('phone',50)->nullable();//电话
            $table->string('email',50)->nullable();//邮箱
            $table->string('fax',50)->nullable();//传真
            $table->string('qq',255)->nullable();//客户qq
            $table->text('referral')->nullable();//店铺介绍
            $table->text('pay')->nullable();//付款说明
            $table->text('delivery')->nullable();//配送说明
            $table->date('creation_date');//创建日期
            $table->integer('state')->default(0);//商品状态
            $table->string('local_phone')->nullable();
            $table->integer('rate_val')->nullable();
            $table->integer('rate_count')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }


 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('businesses');
    }
}
