<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'contract_address' => 'nullable|string|max:255',
            'website_link' => 'required|url|max:255',
            'token_explorer_link' => 'required|url|max:255',
            'telegram_link' => 'required|url|max:255',
            'twitter_link' => 'nullable|url|max:255',
            'slack_link' => 'nullable|url|max:255',
            'facebook_link' => 'nullable|url|max:255',
            'reddit_link' => 'nullable|url|max:255',
            'medium_link' => 'nullable|url|max:255',
            'github_link' => 'nullable|url|max:255',
            'discord_link' => 'nullable|url|max:255',
            'features' => 'required|string',
            'embed_url' => 'nullable|url|max:255',
            'whitelist' => 'nullable|boolean',
            'token_pair_currency' => 'nullable|numeric',
            'token_network' => 'required|string|max:10',
            'token_pooled' => 'nullable|numeric',
            'presale' => 'nullable|string|max:10',
            'presale_start_date' => 'nullable|date',
            'presale_end_date' => 'nullable|date',
            'token_symbol' => 'nullable|string|max:12',
            'token_type' => 'nullable|string|max:50',
            'token_distribution' => 'nullable|string|max:255',
            'price_per_token' => 'nullable|numeric',
            'kyc' => 'nullable|string|max:10',
            'participation_restriction' => 'nullable|string|max:255',
            'selling_to_us' => 'nullable|string|max:255',
            'accepts' => 'nullable|string|max:255',
            'exchange_listing_1' => 'nullable|string|max:50',
            'exchange_listing_2' => 'nullable|string|max:50',
            'company_name' => 'nullable|string|max:255',
            'company_information' => 'nullable|string|max:1000',
            'full_name' => 'required|string|max:255',
            'recognition' => 'accepted',
            'permissions_recognition' => 'accepted',
            'involvement' => 'nullable|string|max:1000',
            'email' => 'required|email|unique:projects,email',
            'direct_telegram' => 'nullable|url|max:255',
            'marketing_services' => 'nullable|array',
            'marketing_services.*' => 'nullable|string|max:255',
            'standard_listing_fee' => 'nullable|string|max:255',
            'heard_from' => 'nullable|string|max:255',
            'free_listing' => 'nullable|boolean',
            'express_listing' => 'nullable|boolean',

            'core_team' => 'required|array',
            'core_team.*.logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'core_team.*.full_name' => 'required|string|max:255',
            'core_team.*.job_title' => 'required|string|max:255',
            'core_team.*.linkedin' => 'nullable|url|max:255',

            'advisory_team' => 'sometimes|nullable|array',
            'advisory_team.*.logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'advisory_team.*.full_name' => 'required|string|max:255',
            'advisory_team.*.job_title' => 'required|string|max:255',
            'advisory_team.*.linkedin' => 'nullable|url|max:255',
        ];
    }
}
