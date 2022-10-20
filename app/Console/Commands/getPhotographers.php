<?php

namespace App\Console\Commands;

use App\Services\UnsplashClass;
use Illuminate\Console\Command;

class getPhotographers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:photographers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command provides to store photographer informations to the database.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $service = new UnsplashClass();

        return $service->getPhotographers();
    }
}
