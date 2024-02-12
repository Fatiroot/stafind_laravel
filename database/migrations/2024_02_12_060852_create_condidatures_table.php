<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condidatures', function (Blueprint $table) {
            $table->id();
            $table->date('date_postulation');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('offre_stage_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condidatures');
    }
};
