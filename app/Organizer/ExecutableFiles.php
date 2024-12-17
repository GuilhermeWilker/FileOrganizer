<?php

namespace FileOrganizer\Organizer;

use FileOrganizer\Enums\Extension;

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

    public function __invoke(): void
    {
        $fileExtension = pathinfo($this->file, PATHINFO_EXTENSION);

        if (
            Extension::tryFrom($fileExtension) === Extension::EXE ||
            Extension::tryFrom($fileExtension) === Extension::MSI
        ) {

            if (!is_dir($this->newPath . 'executáveis/')) {
                mkdir($this->newPath . 'executáveis/', 0777, true);
            }

            if (!file_exists($this->newPath . 'executáveis/' . $this->file)) {
                rename($this->oldPath . $this->file, $this->newPath . 'executáveis/' . $this->file);
            }

        }
    }
}