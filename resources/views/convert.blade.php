{{-- тут хранится шаблон соновного html файла --}}
@extends('app')
{{-- секция для указания названия страницы --}}
@section('title')Конвертер валют@endsection
{{-- секция, куда в основной шаблон html вставляется основной контент данной страницы (секцию нужно закрывать!) --}}
@section('content')

        <h1>Конвертер валют</h1>
        <form id="currency-converter">
            <div class="form-group">
                <label for="from_currency">Из валюты:</label>
                <select id="from_currency" name="from_currency" class="form-control">
                </select>
                <small id="from_currency_rate" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="to_currency">В валюту:</label>
                <select id="to_currency" name="to_currency" class="form-control">
                </select>
                <small id="to_currency_rate" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="amount">Сумма:</label>
                <input type="number" id="amount" name="amount" class="form-control" min="1" value="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Конвертировать</button>
        </form>

        <div class="mt-4">
            <p>Результат конвертации: <b><span id="result"></span></b></p>
        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // получаем данные о валютах с помощью restapi
            $.get('/currencies', function(data) {
            // заполняем выпадающие списки валют
                $.each(data, function(index, currency) {
                    $('#from_currency, #to_currency').append(
                        $('<option>', {
                            value: currency.name,
                            'data-value': currency.value,
                            text: currency.name // здесь находятся название валюты
                        })
                    );
                });

            // обновляем курсы валют
                $('#from_currency, #to_currency').trigger('change');
            })

             // обновление курса валют при выборе
            $('#from_currency, #to_currency').on('change', function() {
                const selectedCurrency = $(this).find('option:selected');
                const currencyValue = selectedCurrency.data('value');
                
                if ($(this).attr('id') === 'from_currency') {
                    $('#from_currency_rate').text(`Курс: ${currencyValue} руб.`);
                } else {
                    $('#to_currency_rate').text(`Курс: ${currencyValue} руб.`);
                }
            });

            $('#currency-converter').on('submit', function(e) {
                e.preventDefault(); // меняем стандартную форму

                const fromCurrency = $('#from_currency').val();
                const toCurrency = $('#to_currency').val();
                const amount = parseFloat($('#amount').val());

                // получаем курсы валют
                $.get('/currencies', function(data) {
                    const fromValue = data.find(c => c.name === fromCurrency).value;
                    const toValue = data.find(c => c.name === toCurrency).value;

                // конвертируем сумму
                    const convertedAmount = (fromValue / toValue) / amount;

                // отображаем результат
                    $('#result').text(`${convertedAmount.toFixed(2)} ${toCurrency}`);
                })
            });
        });
    </script>

    <form action="{{ route('user') }}">
        <button class="btn btn-primary w-100 py-2" type="submit">Вернуться назад</button>
    </form>
</body>
</html>

@endsection