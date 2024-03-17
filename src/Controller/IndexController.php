<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ClientApi\CurrencyRateClientApiService;
use App\Service\ClientApi\GosDumClientApiService;
use App\Service\ClientApi\UniversitiesClientApiService;
use App\Service\PopulationDataService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    public function __construct(
        private readonly PopulationDataService $populationDataService,
        private readonly CurrencyRateClientApiService $currencyRateClientApiService,
        private readonly GosDumClientApiService $gosDumClientApiService,
        private readonly UniversitiesClientApiService $universitiesClientApiService,

    ) {}

    #[Route(path: '/', methods: ['GET'])]
    public function index(): Response
    {
        $populationByTerritorialBasis = $this->populationDataService->getPopulationsByTerritorialBasis();
        $populationInfo = $this->populationDataService->getPopulationInfo();
        $currencyRates = $this->currencyRateClientApiService->getCurrencyRates();
        $sortedSubjectLegislaturesByActivity = $this->gosDumClientApiService->getSortedSubjectLegislaturesByActivity();
        $universities = $this->universitiesClientApiService->getUniversities();


        return $this->render('base.html.twig', [
            'territory_data' => json_encode($populationByTerritorialBasis, JSON_UNESCAPED_UNICODE),
            'population_info' => json_encode($populationInfo),
            'currency_rates' => $currencyRates,
            'sorted_subject_legislatures_by_activity' => $sortedSubjectLegislaturesByActivity,
            'universities' => $universities,
        ]);
    }
}
