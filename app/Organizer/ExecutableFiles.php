<?php

namespace FileOrganizer\Organizer;

use FileOrganizer\Enums\Extension;
use FileOrganizer\Interfaces\FilesOrganizer;
use FileOrganizer\Managers\DirectoryManager;

class ExecutableFiles implements FilesOrganizer
{
    public static function organize(string $oldPath, string $newPath, string $file): void
    {
        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

        $folderName = "Executáveis/";

        $directoryManager = new DirectoryManager($file);

        if (
            Extension::tryFrom($fileExtension) === Extension::EXE ||
            Extension::tryFrom($fileExtension) === Extension::MSI
        ) {

            $directoryManager
                ->make($newPath, $oldPath, $folderName . 'Instaladores/');

        } else if (
            Extension::tryFrom($fileExtension) === Extension::ISO
        ) {
            $directoryManager
                ->make($newPath, $oldPath, $folderName . 'ISOs/');
        }
    }
}