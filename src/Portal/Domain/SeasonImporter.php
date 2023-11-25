<?php

namespace Portal\Domain;

interface SeasonImporter
{
    public function importFrom(string $path): void;
}
