<?php

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Alura\BuscadorDeCursos\Classes\Searcher;

$searcher = new Searcher('Mateus Oliveira');
$name = $searcher->returnName();

echo $name. PHP_EOL;


$client = new Client(['verify' => false]);
$destinyUrl = 'https://www.alura.com.br/cursos-online-programacao/php';

$response = $client->request('GET', $destinyUrl);
$htmlBody = $response->getBody();

$crawler = new Crawler();
$crawler->addHtmlContent($htmlBody);

$courses = $crawler->filter('span.card-curso__nome');

foreach($courses as $course){
    echo $course->textContent . PHP_EOL;
}