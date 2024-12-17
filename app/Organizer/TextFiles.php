<?php

namespace FileOrganizer\Organizer;

use FileOrganizer\Enums\Extension;

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

    public function __invoke(): void
    {
        $fileExtension = pathinfo($this->file, PATHINFO_EXTENSION);

        if (
            Extension::tryFrom($fileExtension) === Extension::PDF ||
            Extension::tryFrom($fileExtension) === Extension::DOCX ||
            Extension::tryFrom($fileExtension) === Extension::DOC ||
            Extension::tryFrom($fileExtension) === Extension::TXT
        ) {

            if (!is_dir($this->newPath . 'arquivos_de_texto/')) {
                mkdir($this->newPath . 'arquivos_de_texto/', 0777, true);
            }

            if (!file_exists($this->newPath . 'arquivos_de_texto/' . $this->file)) {
                rename($this->oldPath . $this->file, $this->newPath . 'arquivos_de_texto/' . $this->file);
            }

        }
    }
}