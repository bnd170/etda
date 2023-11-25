<?php

namespace Portal\Infrastructure;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Portal\Domain\SeasonImporter;

class SeasonImporterXls implements SeasonImporter
{
    public function importFrom(string $path): void
    {
        $spreadsheet = IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();

        dd($sheet->toArray());
    }
}
