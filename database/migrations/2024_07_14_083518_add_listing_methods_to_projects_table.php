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
    Schema::table('projects', function (Blueprint $table) {
        $table->boolean('free_listing')->default(false);
        $table->boolean('express_listing')->default(false);
    });
}

public function down()
{
    Schema::table('projects', function (Blueprint $table) {
        $table->dropColumn('free_listing');
        $table->dropColumn('express_listing');
    });
}
};
