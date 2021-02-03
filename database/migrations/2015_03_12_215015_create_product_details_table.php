<?php

/**
 * Antvel - Data Base
 * Products Detail Table.
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->enum('input_type', ['text', 'select', 'radio', 'checkbox', 'image', 'document']);
            $table->text('default_values');
            $table->text('validation_rules');
            $table->text('help_message');
            $table->string('type_products');
            $table->smallInteger('max_num_values')->default(1);
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_details');
    }
}
