<?php

namespace FileOrganizer\Organizer;

use FileOrganizer\Enums\Extension;

class CompressedFiles
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
            Extension::tryFrom($fileExtension) === Extension::RAR ||
            Extension::tryFrom($fileExtension) === Extension::ZIP
        ) {

            if (!is_dir($this->newPath . 'compactados/')) {
                mkdir($this->newPath . 'compactados/', 0777, true);
            }

            if (!file_exists($this->newPath . 'compactados/' . $this->file)) {
                rename($this->oldPath . $this->file, $this->newPath . 'compactados/' . $this->file);
            }

        }
    }
}