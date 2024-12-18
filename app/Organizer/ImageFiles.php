<?php

namespace FileOrganizer\Organizer;

use FileOrganizer\Enums\Extension;
use FileOrganizer\Managers\DirectoryManager;

class ImageFiles
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
            Extension::tryFrom($fileExtension) === Extension::PNG ||
            Extension::tryFrom($fileExtension) === Extension::JPG ||
            Extension::tryFrom($fileExtension) === Extension::JPEG ||
            Extension::tryFrom($fileExtension) === Extension::ICO
        ) {

            new DirectoryManager($this->file)
                ->make($this->newPath, $this->oldPath, 'imagens/');

        }
    }
}