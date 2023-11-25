<?php

namespace Portal\Application;

use Portal\Domain\SeasonImporter;

class SeasonImport
{
    public function __construct(private readonly SeasonImporter $seasonImporter)
    {
    }

    public function __invoke(string $filePath): void
    {
        $this->seasonImporter->importFrom($filePath);
    }
}
