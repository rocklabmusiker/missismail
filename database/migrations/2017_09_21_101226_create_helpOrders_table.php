<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helpOrders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link',255); // Ссылка на товар
            $table->string('name', 255); // Название
            $table->string('article', 255)->nullable(); // Артикул №
            $table->string('price',50); // Цена в евро 
            $table->string('shipment',50)->nullable(); // доставка по Германии
            $table->integer('value'); // Количество
            $table->string('color', 200)->nullable(); // Цвет
            $table->string('size',200)->nullable(); // Размер
            $table->text('comment')->nullable(); // Комментарий

            $table->enum('status', ['new','in_processing', 'done', 'archive'])->default('new');

            $table->integer('user_id')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('helpOrders');
    }
}
