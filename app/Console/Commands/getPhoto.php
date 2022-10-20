<?php

namespace App\Console\Commands;

use App\Services\UnsplashClass;
use Illuminate\Console\Command;

class getPhoto extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:photos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command provides to store photo and photo links informations to the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $photos = new UnsplashClass();
        return $photos->getPhotos();    }
}
