<?php

declare(strict_types=1);

namespace App\Service\ClientApi;

use Redis;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Throwable;

class CurrencyRateClientApiService
{
    const CURRENCY_API_HOST = 'https://api.freecurrencyapi.com';
    const BASE_CURRENCIES = ['EUR', 'USD', 'CNY', 'GBP'];

    public function __construct(
        private readonly string $apiKeyCurrency,
        private readonly HttpClientInterface $currencyClient,
        private readonly Redis $redis,
    ) {}

    public function getCurrencyRates(): array
    {
        $currencyRates = [];

        foreach (self::BASE_CURRENCIES as $baseCurrency) {

            $cachedCurrencyRate = $this->redis->get('rate:' . $baseCurrency);

            if (false === $cachedCurrencyRate) {
                try {
                    $response = $this->currencyClient->request('GET', self::CURRENCY_API_HOST . '/v1/latest', [
                        'query' => [
                            'apikey' => $this->apiKeyCurrency,
                            'base_currency' => $baseCurrency,
                            'currencies' => 'RUB',
                        ]
                    ]);

                    $currencyRate = round(json_decode($response->getContent())->data->RUB, 2);
                    $this->redis->set('rate:' . $baseCurrency, $currencyRate, ['ex' => 3600]);

                    $currencyRates[$baseCurrency] = $currencyRate;
                } catch (Throwable $e) {
                }
            } else {
                $currencyRates[$baseCurrency] = $cachedCurrencyRate;
            }
        }

        return $currencyRates;
    }
}
