<?php

namespace FileOrganizer\Organizer;

use FileOrganizer\Enums\Extension;
use FileOrganizer\Managers\DirectoryManager;

class ExecutableFiles
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
            Extension::tryFrom($fileExtension) === Extension::EXE ||
            Extension::tryFrom($fileExtension) === Extension::MSI
        ) {

            new DirectoryManager($this->file)
                ->make($this->newPath, $this->oldPath, 'executáveis/');

        }
    }
}