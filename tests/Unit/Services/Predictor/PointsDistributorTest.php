<?php

namespace Tests\Unit\Services\Predictor;

use App\Services\Predictor\PointsDistributor;
use Tests\Unit\Model\Predictor\GameBuilder;
use Tests\Unit\Model\Predictor\PredictionMother;

class PointsDistributorTest extends PredictorTestCase
{
    private PointsDistributor $pointsDistributorService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->pointsDistributorService = new PointsDistributor(
            $this->predictionRepository()
        );
    }

    public function test_it_adds_three_points_if_selection_matches_with_game_winner(): void
    {
        $prediction = PredictionMother::localWins();
        $game       = GameBuilder::create()->homeWins(homeScore: 4)->build();
        $this->shouldFindPredictionsByGameId($game->id, [$prediction]);
        $this->shouldSavePrediction($prediction);

        $this->pointsDistributorService->distributeFor($game);

        $this->assertEquals(3, $prediction->points);
    }

    public function test_it_subtract_one_point_if_selection_doesnt_match_with_game_winner(): void
    {
        $prediction = PredictionMother::awayWins();
        $game       = GameBuilder::create()->homeWins()->build();
        $this->shouldFindPredictionsByGameId($game->id, [$prediction]);
        $this->shouldSavePrediction($prediction);

        $this->pointsDistributorService->distributeFor($game);

        $this->assertEquals(-1, $prediction->points);
    }

    public function test_it_adds_five_extra_points_if_score_matches_with_game_score(): void
    {
        $prediction = PredictionMother::localWins();
        $game = GameBuilder::create()->homeWins(
            homeScore: $prediction->home_score,
            awayScore: $prediction->away_score
        )->build();
        $this->shouldFindPredictionsByGameId($game->id, [$prediction]);
        $this->shouldSavePrediction($prediction);

        $this->pointsDistributorService->distributeFor($game);

        $this->assertEquals(3 + 5, $prediction->points);
    }
}
