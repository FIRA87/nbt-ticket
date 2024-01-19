<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('i_o');
            $table->string('corres');
            $table->string('mt_msg');
            $table->string('ref_msg');
            $table->date('date_msg');
            $table->string('cur_mt');
            $table->string('sum_mt');
            $table->string('stat_st');
            $table->string('stat_ed');
            $table->string('sum_cur');
            $table->string('send_rece');
            $table->string('shapka');
            $table->string('mac_block');
            $table->string('pro_ka');
            $table->string('sar');
            $table->text('pol');
            $table->date('cre_dat');
            $table->date('tmpcre_dat');
            $table->string('sel');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
