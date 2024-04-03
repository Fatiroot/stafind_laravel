<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Constraint\Constraint;

return new class extends Migration
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
        $table->string('fullname');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('address')->nullable();
        $table->string('phone')->nullable();
        $table->boolean('status')->default(1);
        $table->unsignedBigInteger('company_id')->nullable();
        $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');
        $table->softDeletes();
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
};
