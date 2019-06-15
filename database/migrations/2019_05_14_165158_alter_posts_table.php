<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->tinyInteger("status")->default(0)->after("user_id");
        });
    }

    public function down()
    {
        Schema::table("posts", function (Blueprint $table) {
           $table->dropColumn("status");
        });
    }
}
