<?php

namespace FileOrganizer\Organizer;

use FileOrganizer\Enums\Extension;
use FileOrganizer\Interfaces\FilesOrganizer;
use FileOrganizer\Managers\DirectoryManager;

class DocumentsFiles implements FilesOrganizer
{
    public static function organize(string $oldPath, string $newPath, string $file): void
    {
        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

        $folderName = "Documentos/";

        $directory = new DirectoryManager($file);

        if (
            Extension::tryFrom($fileExtension) === Extension::DOC ||
            Extension::tryFrom($fileExtension) === Extension::DOCX
        ) {

            $directory
                ->make($newPath, $oldPath, $folderName . 'Word/');

        } else if (
            Extension::tryFrom($fileExtension) === Extension::PDF ||
            Extension::tryFrom($fileExtension) === Extension::TXT
        ) {

            $directory
                ->make($newPath, $oldPath, $folderName . 'PDF/');

        } else if (
            Extension::tryFrom($fileExtension) === Extension::XLS ||
            Extension::tryFrom($fileExtension) === Extension::XLSX
        ) {

            $directory
                ->make($newPath, $oldPath, $folderName . 'Planilhas/');

        } else if (
            Extension::tryFrom($fileExtension) === Extension::RAR ||
            Extension::tryFrom($fileExtension) === Extension::ZIP ||
            Extension::tryFrom($fileExtension) === Extension::ISO
        ) {

            $directory
                ->make($newPath, $oldPath, $folderName . 'Compactados/');

        }
    }
}