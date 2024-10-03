<?php

namespace Tests\Unit\Services\Predictor;

use App\Services\Predictor\PointsDistributor;
use Tests\Unit\Model\Predictor\GameBuilder;
use Tests\Unit\Model\Predictor\PredictionMother;

class PointsDistributorServiceTest extends PredictorTestCase
{
    private PointsDistributor $pointsDistributorService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->pointsDistributorService = new PointsDistributor(
            $this->predictionRepository()
        );
    }

    public function test_distributes_points_correctly(): void
    {
        $prediction = PredictionMother::localWins();
        $game       = GameBuilder::create()->localWins()->build();
        $this->shouldFindPredictionsByGameId($game->id, [$prediction]);

        $this->pointsDistributorService->distributeFor($game);

        $this->assertEquals(3, $prediction->points);
    }
}
