<?php

namespace FileOrganizer\Organizer;

use FileOrganizer\Enums\Extension;

class VideoFiles
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
            Extension::tryFrom($fileExtension) === Extension::MP4 ||
            Extension::tryFrom($fileExtension) === Extension::MOV
        ) {

            if (!is_dir($this->newPath . 'videos/')) {
                mkdir($this->newPath . 'videos/', 0777, true);
            }

            if (!file_exists($this->newPath . 'videos/' . $this->file)) {
                rename($this->oldPath . $this->file, $this->newPath . 'videos/' . $this->file);
            }

        }
    }
}