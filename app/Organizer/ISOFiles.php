<?php

namespace FileOrganizer\Organizer;

use FileOrganizer\Enums\Extension;

class ISOFiles
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
            Extension::tryFrom($fileExtension) === Extension::ISO
        ) {

            if (!is_dir($this->newPath . 'ISO/')) {
                mkdir($this->newPath . 'ISO/', 0777, true);
            }

            if (!file_exists($this->newPath . 'ISO/' . $this->file)) {
                rename($this->oldPath . $this->file, $this->newPath . 'ISO
                /' . $this->file);
            }

        }
    }
}