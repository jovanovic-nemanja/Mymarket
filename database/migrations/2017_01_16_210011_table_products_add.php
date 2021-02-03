<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableProductsAdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('import')->default(0);
            $table->string('origin',50)->nullable();
            $table->string('quality_time',50)->nullable();
            $table->string('plan_date',50)->nullable();
            $table->string('pack',50)->nullable();
            $table->string('code')->nullable();
            $table->string('number',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
