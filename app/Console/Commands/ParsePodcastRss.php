<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\XMLController;

class ParsePodcastRss extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'podcast:parse {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse a podcast RSS feed and store high level data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = $this->argument('url');
        $this->info('in progress, url is ' . $url);
        $xml = new XMLController;
        $xml->index($url);
        $this->newLine();
    }
}
