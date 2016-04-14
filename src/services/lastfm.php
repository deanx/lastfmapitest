<?php
use LastFmApi\Api\AuthApi;
use LastFmApi\Api\GeoAPI;
use LastFmApi\Api\ArtistApi;

class LastFmService {
  public function __construct($apikey)
    {
        $this->apiKey = $apikey;
        $auth = new AuthApi('setsession', array('apiKey' => $this->apiKey));
        $this->geoAPI = new GeoAPI($auth);
        $this->artistAPI = new ArtistApi($auth);
    }

    public function getTopArtistsByCountry($country, $page = 1, $limit = 5)
    {
        $topArtists = $this->geoAPI->getTopArtists(array("country" => $country, "page" => $page, "limit" => $limit));

        $artistsParser = function($artist) {
          return array("name" => $artist["name"], "images" => $artist["image"]);
        };

        return array_map($artistsParser, $topArtists);
    }

    private function getArtistInfo($artist) {
      $artistInfo = $this->artistAPI->getInfo(array("artist" => $artist));
      return $artistInfo;
    }

    public function getArtistThumb($artist, $size = "small") {
      return $this->getArtistInfo($artist)["image"][$size];
    }

    public function getArtistTopTracks($artist) {
      $tracks = $this->artistAPI->getTopTracks(array("artist" => $artist));

      return $tracks;
    }

}
