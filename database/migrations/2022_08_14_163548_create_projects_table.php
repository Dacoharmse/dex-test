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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('logo');
            $table->text('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('additional_notes')->nullable();
            $table->string('website_link');
            $table->string('whitepaper_link');
            $table->string('twitter_link')->nullable();
            $table->string('slack_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('reddit_link')->nullable();
            $table->string('medium_link')->nullable();
            $table->string('github_link')->nullable();
            $table->string('discord_link')->nullable();
            $table->text('features');
            $table->string('offical_video')->nullable();
            $table->boolean('whitelist')->nullable()->default(false);
            $table->string('token_sale_hard_cap')->nullable();
            $table->string('token_sale_hard_cap_currency')->nullable();
            $table->string('token_sale_soft_cap')->nullable();
            $table->string('token_sale_soft_cap_currency')->nullable();
            $table->string('presale');
            $table->date('presale_start_date')->nullable();
            $table->date('presale_end_date')->nullable();
            $table->string('token_symbol')->nullable();
            $table->string('token_type')->nullable();
            $table->text('token_distrubution')->nullable();
            $table->double('price_per_token')->nullable();
            $table->boolean('kyc')->nullable()->default(false);
            $table->string('participation_restrication')->nullable();
            $table->boolean('selling_to_us')->default(false);
            $table->string('accepts')->nullable();
            $table->string('exchange_listing')->nullable();
            $table->string('company_name');
            $table->string('company_information')->nullable();
            $table->string('full_name');
            $table->boolean('recognition');
            $table->string('involvement');
            $table->string('email')->unique();
            $table->string('direct_telegram');
            $table->string('marketing_services');
            $table->boolean('standard_listing_fee')->default(false);
            $table->string('heared_from')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

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
        Schema::dropIfExists('projects');
    }
};
