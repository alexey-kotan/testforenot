<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyApiController extends Controller
{
    public function getCurrencies()
    {
        // получаем данные о валютах с помощью restapi
        $response = Http::get('https://www.cbr-xml-daily.ru/daily_json.js');
        // проверяем успешен ли запрос
        if ($response->failed()) {
            return response()->json(['error' => 'Не удалось получить данные о валютах.'], 500);
        }

        // получаем данные из json
        $data = $response->json();
        $currencies = $data['Valute'];
        //преобразуем данные в нужный нам формат
        $currencyData = [];
        foreach ($currencies as $currency) {
            $currencyData[] = [
                'name' => $currency['Name'],
                'value' => (float) str_replace(',', '.', $currency['Value']),
            ];
        }

        // возвращаем данные о валютах в json формате
        return response()->json($currencyData);
    }
}