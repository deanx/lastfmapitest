<?php
require __DIR__ . '/../vendor/autoload.php';
require_once(__DIR__ . '/services/lastfm.php');
require_once(__DIR__ . '/conf/config.php');

$last = new LastFmService(APIKEY);

$artist = $_GET['artist'];
$country = $_GET['country'];

$page = (int)$_GET['page'] ?: 1;

define(MAX_COUNTRY_ITEMS, 50);
define(MAX_ARTISTS_PER_PAGE, 5);

$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader);


if($country) {
$topArtists = $last->getTopArtistsByCountry($country, $page, MAX_ARTISTS_PER_PAGE);
echo $twig->render('index.html', array('country' => $country,
      'artists' => $topArtists, 'num_pages' => MAX_COUNTRY_ITEMS / MAX_ARTISTS_PER_PAGE));
} elseif($artist) {
  $artistTracks = $last->getArtistTopTracks($artist);
  echo $twig->render('artist.html', array('artist' => $artist,
        'tracks' => $artistTracks));
}
else {
  echo $twig->render('base_template.html');
}
