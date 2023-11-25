<?php

namespace Portal\Domain;

class SeasonResource
{
    public function __construct(public int $year, public bool $inProgress)
    {
    }
}
