<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTokenColumnsInProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Renaming the columns
            $table->renameColumn('token_sale_soft_cap_currency', 'token_hard_cap_currency');
            $table->renameColumn('token_sale_hard_cap_currency', 'token_network');
            $table->renameColumn('token_sale_hard_cap', 'token_pair_currency');
            $table->renameColumn('token_sale_soft_cap', 'token_pooled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Reverting the column name changes
            $table->renameColumn('token_hard_cap_currency', 'token_sale_soft_cap_currency');
            $table->renameColumn('token_network', 'token_sale_hard_cap_currency');
            $table->renameColumn('token_pair_currency', 'token_sale_hard_cap');
            $table->renameColumn('token_pooled', 'token_sale_soft_cap');
        });
    }
}
