<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Database\Eloquent\Builder;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Cast attributes to native types.
     *
     * @var array
     */
    protected $casts = [
        'exchange_listings' => 'array', // Automatically cast to array
    ];

    protected function marketingServices(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    public function coreTeam(): HasMany
    {
        return $this->hasMany(Team::class)->where('type', 'core');
    }

    public function advisoryTeam(): HasMany
    {
        return $this->hasMany(Team::class)->where('type', 'advisory');
    }

    #[ArrayShape(['facebook' => "mixed", 'twitter' => "mixed", 'discord' => "mixed", 'github' => "mixed", 'slack' => "mixed", 'reddit' => "mixed", 'medium' => "mixed"])]
    public function getLinksAttribute(): array
    {
        return [
            'telegram' => $this->telegram_link,
            'facebook' => $this->facebook_link,
            'twitter' => $this->twitter_link,
            'discord' => $this->discord_link,
            'github' => $this->github_link,
            'slack' => $this->slack_link,
            'reddit' => $this->reddit_link,
            'medium' => $this->medium_link,
        ];
    }

    /**
     * Scope a query to only include approved projects.
     *
     * @param $query
     * @return Builder
     */
    public function scopeIsApproved($query): Builder
    {
        return $query->where('status', 'approved');
    }
}
