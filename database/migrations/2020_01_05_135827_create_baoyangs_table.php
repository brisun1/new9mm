<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaoyangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baoyangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ucountry');
            $table->string('uname');
            $table->integer('user_id');
            $table->text('topic');
            $table->text('info');
            $table->string('tel');
            $table->string('email');
            $table->string('city');
            $table->string('national');
            $table->string('age');
            $table->string('look');
            $table->string('shape');
            $table->string('price');
            $table->string('height');
            $table->string('hobby');
            $table->string('period');
            $table->string('img0');
            $table->string('img1');
            $table->string('img2');
            $table->boolean('verified')->nullable();
            $table->date('expired_at')->nullable();
            // $table->softDeletes();
            // $table->deleted_at();
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
        Schema::dropIfExists('baoyangs');
    }
}
