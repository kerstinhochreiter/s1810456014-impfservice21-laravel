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
            $table->id();
            $table->integer('svnr');
            $table->integer('gender'); //1=weiblich //2=männlich //3=divers
            $table->string('firstname');
            $table->string('lastname');
            $table->string('street');
            $table->integer('number');
            $table->date('birth');
            $table->integer('phonenumber');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('hasvaccination')->default(false); //true = geimpft //false = nicht geimpft
            $table->boolean('isadmin')->default(false); //true = admin //false = no admin
            /**VARIANTE 1
              $table->bigInteger('vaccination_id')->unsigned();
              $table->foreign('vaccination_id')->references('id')->on('vaccinations')->onDelete('cascade');
              VARIANTE 2
              $table->foreignId('vaccination_id')->constrained()->onDelete('cascade');
             **/
            $table->foreignId('vaccination_id')->nullable()->references('id')->on('vaccinations')->onDelete('cascade');
            $table->timestamps();
        });

        /**
         * VARIANTE 3:
         * Schema::table("users", function (Blueprint $table) {
         * $table->foreign("vaccination_id")->references("id")->on("vaccinations")->onDelete("cascade");
        });**/
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
