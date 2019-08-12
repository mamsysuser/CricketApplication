<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1555355681971MatchesTable extends Migration
{
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('match_title', 255);
            $table->unsignedInteger('firstteam_id');
            $table->unsignedInteger('secondteam_id');
            $table->unsignedInteger('winningteam_id')->nullable();
            $table->foreign('firstteam_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('secondteam_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('winningteam_id')->references('id')->on('teams')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
