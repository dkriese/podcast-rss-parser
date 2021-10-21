<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo 'in progress, url is ' . $this->argument('url');
    }
}
