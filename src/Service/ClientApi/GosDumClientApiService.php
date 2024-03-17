<?php

declare(strict_types=1);

namespace App\Service\ClientApi;

use Redis;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GosDumClientApiService
{
    const GOSDUM_API_HOST = 'http://api.duma.gov.ru';

    public function __construct(
        private readonly string $apiKeyAppGosdum,
        private readonly string $apiKeyGosdum,
        private readonly HttpClientInterface $gosdumClient,
        private readonly Redis $redis,
    ) {}

    private function getSubjectLegislatures(): array
    {
        $cachedLegislatures = $this->redis->get('legislatures');

        if (false === $cachedLegislatures) {

        $response = $this->gosdumClient->request('GET', self::GOSDUM_API_HOST . '/api/' . $this->apiKeyGosdum . '/regional-organs.json', [
            'query' => [
                "app_token" => $this->apiKeyAppGosdum,
            ],
        ]);

        $legislaturesJson = $response->getContent();

        $this->redis->set('legislatures', $legislaturesJson, ['ex' => 86400]);

            return json_decode($legislaturesJson);
        }

        return json_decode($cachedLegislatures);
    }

    public function getSortedSubjectLegislaturesByActivity(): array
    {
        $legislatures = $this->getSubjectLegislatures();

        $activeLegislatures = array_filter($legislatures, function ($regionalOrgan) {
            return (bool)$regionalOrgan->isCurrent;
        });

        $inactiveLegislatures = array_filter($legislatures, function ($regionalOrgan) {
            return !$regionalOrgan->isCurrent;
        });

        return ['active' => $activeLegislatures, 'inactive' => $inactiveLegislatures];
    }
}
