<?php

namespace FileOrganizer\Organizer;

use FileOrganizer\Enums\Extension;

class AudioFiles
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
            Extension::tryFrom($fileExtension) === Extension::MP3 ||
            Extension::tryFrom($fileExtension) === Extension::M4A
        ) {

            if (!is_dir($this->newPath . 'áudios/')) {
                mkdir($this->newPath . 'áudios/', 0777, true);
            }

            if (!file_exists($this->newPath . 'áudios/' . $this->file)) {
                rename($this->oldPath . $this->file, $this->newPath . 'áudios/' . $this->file);
            }

        }
    }
}