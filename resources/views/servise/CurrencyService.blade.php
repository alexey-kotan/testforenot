<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class CurrencyParserController extends Controller
{
    public function parseCurrencies()
    {
        // Create a new Goutte client
        $client = new Client();
        
        // Request the daily currency page from the Central Bank of Russia
        $crawler = $client->request('GET', 'https://www.cbr.ru/currency_base/daily/');

        // Extract currency data
        $currencies = $crawler->filter('table.data tr')->each(function ($node) {
            // Get currency name and value
            $currencyName = $node->filter('td:nth-child(3)')->text();
            $currencyValue = $node->filter('td:nth-child(4)')->text();

            // Return as an associative array
            return [
                'name' => $currencyName,
                'value' => $currencyValue,
            ];
        });

        // Remove the first element if it's a header row
        array_shift($currencies);

        return response()->json($currencies);
    }
}