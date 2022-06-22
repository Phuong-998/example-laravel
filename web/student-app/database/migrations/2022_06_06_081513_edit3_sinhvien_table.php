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
        Schema::table('sinhvien', function (Blueprint $table) {
            $table->string('abg')->nullable();
            $table->string('qua')->nullable();
            $table->string('nvb')->nullable();
            $table->string('xc')->nullable();
            $table->string('za')->nullable();
            $table->string('vb')->nullable();
            $table->string('ff')->nullable();
            //
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sinhvien', function (Blueprint $table) {
            //
        });
    }
};
