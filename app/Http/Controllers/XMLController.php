<?php

namespace App\Http\Controllers;

use App\Models\Podcast;

//use Illuminate\Http\Request;

class XMLController extends Controller
{
    public function index($url)
    {
        if (@simplexml_load_file($url)) {
            $feed = simplexml_load_file($url);
        } else {
            return false;
        }

        $this->store($url, $feed);
    }

    public function store($url, $feed)
    {
        $podcastData = [
            'title' => $feed->channel->title,
            'artwork_url' => $feed->channel->image->url,
            'rss_feed_url' => $url,
            'description' => $feed->channel->description,
            'language' => $feed->channel->language,
            'website_url' => $feed->channel->link,
        ];
        $podcast = Podcast::create($podcastData);


        foreach ($feed->channel->item as $item) {
            $episode = $podcast->episodes()->create([
                'title' => $item->title,
                'description' => $item->description,
                'audio_url' => $item->enclosure->attributes() ?? null,
            ]);
        }
    }
}
