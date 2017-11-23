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
            $table->increments('id');
            $table->string('email',100)->unique();
            $table->string('password');
            $table->string('name', 30)->nullable(); // имя
            $table->string('lastname', 30)->nullable(); // фамилия
            $table->string('street', 50)->nullable();   // улица
            $table->string('homeNumber', 10)->nullable(); // номер дома
            $table->integer('flat')->nullable(); // номер квартиры
            $table->string('postcode', 20)->nullable(); // почтовый индекс 
            $table->string('city', 50)->nullable(); // город
            $table->string('area', 50)->nullable(); // район, область
            $table->string('country', 50)->nullable(); // страна
            $table->string('phoneNumber',50)->nullable(); // домашний телефон
            $table->string('mobile',50)->nullable(); // сотовый
            $table->integer('buyNumber')->default(0); // номер покупки
            $table->float('money',8,2)->default(0); // денежный баланс
            $table->boolean('showAddressForOrderSelf')->default(0); // показать адрес для покупок самому
            $table->boolean('verified')->default(0);
            $table->string('email_token')->nullable();

            //$table->boolean('subscription')->nullable(); // подписка на новости
            $table->rememberToken();
            $table->timestamps();
            //$table->boolean('activated')->default('Активирован'); // статус
        });
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
