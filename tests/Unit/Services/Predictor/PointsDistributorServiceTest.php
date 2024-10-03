<?php

use Tests\Unit\Model\Predictor\GameMother;
use Tests\Unit\Model\Predictor\PredictionMother;

beforeEach(function () {
    $this->pointsDistributorService = new PointsDistributorService($this->repository());
});

describe('PointsDistributorService', function () {
    it('distributes points correctly', function () {
        $prediction = PredictionMother::localWins();
        $game = GameMother::create();
        $this->shouldFindPredictionsByGameId($game->id, [$prediction]);

        $this->pointsDistributorService->distributeFor($game);


    });
});
