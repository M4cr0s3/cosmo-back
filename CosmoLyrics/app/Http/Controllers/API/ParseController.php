<?php
//
//namespace App\Http\Controllers\API;
//
//use App\Http\Controllers\Controller;
//use GuzzleHttp\Client;
//use Illuminate\Http\Request;
//use Symfony\Component\DomCrawler\Crawler;
//class ParseController extends Controller
//{
//    public function parseGenres(Request $request)
//    {
//        $url = 'https://learn4joy.ru/vse-zhanry-muzyki/';
//        $client = new Client();
//        $response = $client->get($url);
//        $html = $response->getBody()->getContents();
//
//        $crawler = new Crawler($html);
//
//        $ulElems = $crawler->filter('li');
//
//        $parsedData = [];
//
//        $ulElems->each(function (Crawler $ul, $index) use (&$parsedData) {
//            $ulText = $ul->text();
//            $parsedData[] = $ulText;
//        });
//
//
//        return response()->json([
//            'html' => $parsedData,
//        ]);
//    }
//}
