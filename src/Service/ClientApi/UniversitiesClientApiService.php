<?php

declare(strict_types=1);

namespace App\Service\ClientApi;

use Redis;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Throwable;

class UniversitiesClientApiService
{
    const UNIVERSITIES_API_HOST = 'http://universities.hipolabs.com';

    public function __construct(
        private readonly HttpClientInterface $currencyClient,
        private readonly Redis $redis,
    )
    {
    }

    public function getUniversities(): array
    {
        $cachedUniversities = $this->redis->get('universities');

        if (false === $cachedUniversities) {
            try {
                $response = $this->currencyClient->request('GET', self::UNIVERSITIES_API_HOST . '/search', [
                    'query' => ['country' => 'Russian Federation']
                ]);

                $this->redis->set('universities' , $response->getContent(), ['ex' => 3600]);

                return json_decode($response->getContent());
            } catch (Throwable $e) {
            }
        }

        return json_decode($cachedUniversities);
    }
}
