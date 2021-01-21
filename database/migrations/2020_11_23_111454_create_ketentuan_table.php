<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetentuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketentuan', function (Blueprint $table) {
            $table->id();
            $table->string('qualifier', 100)->nullable();
            $table->string('code')->nullable();
            $table->string('localizedName', 100)->nullable();
            $table->integer('flagAttr1')->nullable();
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
        Schema::dropIfExists('ketentuan');
    }
}
