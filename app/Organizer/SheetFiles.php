<?php

namespace FileOrganizer\Organizer;

use FileOrganizer\Enums\Extension;

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

    public function __invoke(): void
    {
        $fileExtension = pathinfo($this->file, PATHINFO_EXTENSION);

        if (
            Extension::tryFrom($fileExtension) === Extension::XLSX ||
            Extension::tryFrom($fileExtension) === Extension::XLS
        ) {

            if (!is_dir($this->newPath . 'planilhas/')) {
                mkdir($this->newPath . 'planilhas/', 0777, true);
            }

            if (!file_exists($this->newPath . 'planilhas/' . $this->file)) {
                rename($this->oldPath . $this->file, $this->newPath . 'planilhas/' . $this->file);
            }

        }
    }
}