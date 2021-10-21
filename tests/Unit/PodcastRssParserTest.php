<?php

namespace Tests\Unit;

use Tests\TestCase;
//use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PodcastRssParserTest extends TestCase
{
    use RefreshDatabase;
    public $url = "https://nosleeppodcast.libsyn.com/rss";

    /**
     * Undocumented function
     *
     * @return void
     * @test
     */
    public function command_runs()
    {
        $this->artisan('podcast:parse ' . $this->url)
            ->assertExitCode(1);
    }

    /**
     * Test database
     *
     * @return void
     * @test
     */
    public function podcast_fields_are_populated()
    {
        // not sure how to make the command run just once
        $this->artisan('podcast:parse ' . $this->url);
        $this->assertDatabaseHas('podcasts', ['title' => 'The NoSleep Podcast']);
    }

    /**
     * Episodes
     *
     * @return void
     * @test
     */
    public function episode_fields_are_populated()
    {
        $this->artisan('podcast:parse ' . $this->url);
        $this->assertDatabaseHas('episodes', ['title' => 'NoSleep Podcast S16 - Halloween Hiatus Vol. 2']);
        // test count of rows
    }
}
