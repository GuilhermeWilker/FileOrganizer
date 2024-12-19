<?php

namespace FileOrganizer\Organizer;

use FileOrganizer\Enums\Extension;
use FileOrganizer\Managers\DirectoryManager;

class ShortcutFiles
{
    public static function organize(string $oldPath, string $newPath, string $file): void
    {
        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

        $folderName = "Atalhos/";

        $directoryManager = new DirectoryManager($file);

        if (
            Extension::tryFrom($fileExtension) === Extension::LNK ||
            Extension::tryFrom($fileExtension) === Extension::URL
        ) {

            $directoryManager
                ->make($newPath, $oldPath, $folderName . 'Programas/');

        }
    }
}