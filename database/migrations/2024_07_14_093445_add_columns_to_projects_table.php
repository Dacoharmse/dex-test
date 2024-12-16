<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'contract_address')) {
                $table->string('contract_address')->nullable();
            }
            if (!Schema::hasColumn('projects', 'embed_url')) {
                $table->string('embed_url')->nullable();
            }
            if (!Schema::hasColumn('projects', 'token_sale_hard_cap_currency')) {
                $table->string('token_sale_hard_cap_currency')->nullable();
            }
            if (!Schema::hasColumn('projects', 'token_sale_soft_cap_currency')) {
                $table->string('token_sale_soft_cap_currency')->nullable();
            }
            if (!Schema::hasColumn('projects', 'presale')) {
                $table->string('presale')->nullable();
            }
            if (!Schema::hasColumn('projects', 'free_listing')) {
                $table->boolean('free_listing')->default(false);
            }
            if (!Schema::hasColumn('projects', 'express_listing')) {
                $table->boolean('express_listing')->default(false);
            }
            if (!Schema::hasColumn('projects', 'standard_listing_fee')) {
                $table->boolean('standard_listing_fee')->default(false);
            }
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'contract_address')) {
                $table->dropColumn('contract_address');
            }
            if (Schema::hasColumn('projects', 'embed_url')) {
                $table->dropColumn('embed_url');
            }
            if (Schema::hasColumn('projects', 'token_sale_hard_cap_currency')) {
                $table->dropColumn('token_sale_hard_cap_currency');
            }
            if (Schema::hasColumn('projects', 'token_sale_soft_cap_currency')) {
                $table->dropColumn('token_sale_soft_cap_currency');
            }
            if (Schema::hasColumn('projects', 'presale')) {
                $table->dropColumn('presale');
            }
            if (Schema::hasColumn('projects', 'free_listing')) {
                $table->dropColumn('free_listing');
            }
            if (Schema::hasColumn('projects', 'express_listing')) {
                $table->dropColumn('express_listing');
            }
            if (Schema::hasColumn('projects', 'standard_listing_fee')) {
                $table->dropColumn('standard_listing_fee');
            }
        });
    }
}