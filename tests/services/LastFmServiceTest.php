<?php
namespace Tests\services;
use services\LastFmService;
require(__DIR__ . '/../../src/services/LastFmService.php');
define(APIKEY, '2bd52b75c11bb3a8d3c6c3cebb5a6f8a');


class LastFmServiceTest extends \PHPUnit_Framework_TestCase {

  public function testTopArtistsByCountryWithNoValidAuthShouldReturnEmpty() {
    $service = new LastFmService("not valid");
    $this->assertEmpty($service->getTopArtistsByCountry("Australia"));
  }

  public function testTopArtistsByCountryShouldResponseCorrectLimitSize() {
    $service = new LastFmService(APIKEY);
    $size = 5;
    $page = 1;
    $this->assertEquals($size, count($service->getTopArtistsByCountry("Australia", $page, $size)));

  }
}
