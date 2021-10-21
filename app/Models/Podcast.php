<?php

namespace App\Models;

use App\Models\Episode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Podcast extends Model
{
    use HasFactory;

    protected $fillable = array(
        'title',
        'artwork_url',
        'rss_feed_url',
        'description',
        'language',
        'website_url',
    );

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
