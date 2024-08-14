<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyConverterController extends Controller
{
    public function index()
    {
        // получаем html с курсами валют
        $response = Http::get('https://www.cbr.ru/currency_base/daily/');
        $html = $response->body();
        //создаем dom из html
        $dom = new \DOMDocument();
        @$dom->loadHTML($html);

        // извлекаем данные о валютах
        $currencies = [];
        $rows = $dom->getElementsByTagName('tr');
        foreach ($rows as $row) {
            $cells = $row->getElementsByTagName('td');
            if ($cells->length > 3) {
                $currencyName = trim($cells->item(3)->textContent); // название валюты
                $currencyValue = (float) str_replace(',', '.', trim($cells->item(4)->textContent)); // курс валюты

                // добавляем данные в массив
                $currencies[] = [
                    'name' => $currencyName,
                    'value' => $currencyValue,
                ];
            }
        }

        // удаляем первый элемент если это заголовок таблицы
        array_shift($currencies);

        // возвращаем вьюху с данными о валютах
        return view('convert', ['currencies' => $currencies]);
    }
}