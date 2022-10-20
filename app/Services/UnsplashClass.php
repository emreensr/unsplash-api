<?php

namespace App\Services;

use App\Models\Photo;
use App\Models\Photographer;
use App\Models\PhotoLink;
use Unsplash\HttpClient;
use Unsplash\Search;

class UnsplashClass
{
    protected $applicationId;
    protected $secretKey;

    public function __construct()
    {
        $this->applicationId = config('unsplash.access');
        $this->secretKey = config('unsplash.secret');

        HttpClient::init(
            [
                'applicationId'	=> $this->applicationId,
                'secret'	    => $this->secretKey,
                'callbackUrl'	=> 'http://127.0.0.1:8000',
                'utmSource'     => 'Webtures'
            ]);
    }

    public function getPhotographers()
    {
        $search = 'john';
        $page = 10;
        $per_page = 30;

        $photographers = Search::users($search, $page, $per_page);
        $results = $photographers->getResults();

        for($i = 0; $i < count($results); $i++){
            Photographer::updateOrCreate([
                'pId' => $results[$i]['id'],
                'name' => $results[$i]['name'],
                'username' => $results[$i]['username'],
                'location' => $results[$i]['location'],
                'profile_link' => $results[$i]['links']['html'],
                'likes' => $results[$i]['total_likes']
            ]);
        }
    }

    public function getPhotos()
    {
        $search = 'forest';
        $page = 3;
        $per_page = 30;

        $photos = Search::photos($search, $page, $per_page);
        $results = $photos->getResults();

        for($i = 0; $i < count($results); $i++){
            Photo::updateOrCreate([
                'photoId' => $results[$i]['id'],
                'color' => $results[$i]['color'],
                'description' => $results[$i]['description'],
                'likes' => $results[$i]['likes'],
                'url' => $results[$i]['urls']['full'],
            ]);
        }

        for($i = 0; $i < count($results); $i++){
            PhotoLink::updateOrCreate([
                'photoId' => $results[$i]['id'],
                'full' => $results[$i]['urls']['full'],
                'small' => $results[$i]['urls']['small'],
                'regular' => $results[$i]['urls']['regular'],
                'thumb' => $results[$i]['urls']['thumb'],
            ]);
        }
    }

}
