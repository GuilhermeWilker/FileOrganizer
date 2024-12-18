<?php

namespace FileOrganizer\Organizer;

use FileOrganizer\Enums\Extension;
use FileOrganizer\Managers\DirectoryManager;

class SheetFiles
{
    public function __construct(
        public string $oldPath,
        public string $newPath,
        public string $file
    )
    {
        //..
    }

    public function organize(): void
    {
        $fileExtension = pathinfo($this->file, PATHINFO_EXTENSION);

        if (
            Extension::tryFrom($fileExtension) === Extension::XLSX ||
            Extension::tryFrom($fileExtension) === Extension::XLS
        ) {

            new DirectoryManager($this->file)
                ->make($this->newPath, $this->oldPath, 'planilhas/');

        }
    }
}