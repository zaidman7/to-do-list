<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class ScraperController extends Controller
{
    public function scraper() {
        $client = new Client(['base_uri' => 'https://in-cyprus.philenews.com/']);
        $response = $client->request('GET', '/');
        $body = $response->getBody();
        $contents = $body->getContents();

        $titleRegex = '/class="entry-title\s.+>.+>(.+)<\/a/m';
        preg_match_all($titleRegex, $contents, $matches, PREG_PATTERN_ORDER, 0);
        $titles = $matches[1];

        foreach($titles as $title) {
            $titlesDecoded[] = html_entity_decode($title);
        }

        $imageURLRegex = '/class="entry-thumb.+url\(\'(.+)\'\)/m';
        preg_match_all($imageURLRegex, $contents, $matches, PREG_PATTERN_ORDER, 0);
        $urls = $matches[1];

        $data = array_combine($titlesDecoded, $urls);

        return view('scraper', compact('data'));
    }
}
