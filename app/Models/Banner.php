<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    // Define the table if it differs from the default ('banners')
    protected $table = 'banners';

    // Specify which attributes are mass assignable, if necessary
    protected $fillable = ['image', 'title', 'url', 'description'];
}
