<?php
namespace Tests\services;
use services\LastFmService;
require(__DIR__ . '/../../src/services/LastFmService.php');

class LastFmServiceTest extends \PHPUnit_Framework_TestCase {
  public function testTopArtistsByCountryWithNoValidAuthShouldReturnEmpty() {
    $service = new LastFmService("not valid");
    $this->assertEmpty($service->getTopArtistsByCountry("the beatles"));
  }

  public function testTopArtistsByCountryWithNoValidAuthShouldReturnEmpty() {
    $service = new LastFmService("not valid");
    $this->assertEmpty($service->getTopArtistsByCountry("the beatles"));
  }
}
