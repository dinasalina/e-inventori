<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
    Schema::table('users', function ($table) {
        $table->string('role')->default('staf'); // default pengguna biasa
    });
    }

    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('role');
        });
    }

};
