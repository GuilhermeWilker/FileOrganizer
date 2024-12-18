<?php

namespace FileOrganizer\Organizer;

use FileOrganizer\Enums\Extension;
use FileOrganizer\Managers\DirectoryManager;

class TextFiles
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
            Extension::tryFrom($fileExtension) === Extension::PDF ||
            Extension::tryFrom($fileExtension) === Extension::DOCX ||
            Extension::tryFrom($fileExtension) === Extension::DOC ||
            Extension::tryFrom($fileExtension) === Extension::TXT
        ) {

            new DirectoryManager($this->file)
                ->make($this->newPath, $this->oldPath, 'arquivos_de_texto/');

        }
    }
}