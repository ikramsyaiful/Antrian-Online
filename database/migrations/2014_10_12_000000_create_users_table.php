<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('key', 15);
            $table->string('name');
            $table->string('email');
            $table->string('antrijalan')->default(0);
            $table->string('antriandimiliki')->default(0);
            $table->string('daftarantriandimiliki')->default(0);
            $table->string('pic')->default('assets/images/default.JPG');
            $table->string('bg')->default('assets/images/background.JPG');
            $table->timestamp('email_verified_at');
            $table->string('password');
            $table->string('type')->default('default');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
