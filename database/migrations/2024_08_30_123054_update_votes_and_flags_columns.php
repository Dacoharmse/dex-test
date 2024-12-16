<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVotesAndFlagsColumns extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Rename clicks to votes
            $table->renameColumn('clicks', 'votes');

            // Rename dangers to flags and add a new column for shits
            $table->renameColumn('dangers', 'flags');
            $table->integer('shits')->default(0);
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Revert changes if needed
            $table->renameColumn('votes', 'clicks');
            $table->renameColumn('flags', 'dangers');
            $table->dropColumn('shits');
        });
    }
}
