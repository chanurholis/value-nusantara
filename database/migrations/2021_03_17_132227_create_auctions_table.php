<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->char('id')->primary();
            $table->char('goods_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('final_price');
            $table->char('user_id');
            $table->char('officer_id')->nullable();
            $table->enum('status', ['opened', 'process', 'closed']);
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
        Schema::dropIfExists('auctions');
    }
}
