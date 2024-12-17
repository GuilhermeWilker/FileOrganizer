<?php

namespace FileOrganizer\Organizer;

use FileOrganizer\Enums\Extension;

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

    public function __invoke(): void
    {
        $fileExtension = pathinfo($this->file, PATHINFO_EXTENSION);

        if (
            Extension::tryFrom($fileExtension) === Extension::PNG ||
            Extension::tryFrom($fileExtension) === Extension::JPG ||
            Extension::tryFrom($fileExtension) === Extension::JPEG ||
            Extension::tryFrom($fileExtension) === Extension::ICO
        ) {

            if (!is_dir($this->newPath . 'imagens/')) {
                mkdir($this->newPath . 'imagens/', 0777, true);
            }

            if (!file_exists($this->newPath . 'imagens/' . $this->file)) {
                rename($this->oldPath . $this->file, $this->newPath . 'imagens/' . $this->file);
            }

        }
    }
}