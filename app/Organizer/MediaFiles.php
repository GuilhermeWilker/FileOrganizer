<?php

namespace FileOrganizer\Organizer;

use FileOrganizer\Enums\Extension;
use FileOrganizer\Managers\DirectoryManager;

class MediaFiles
{
    public static function organize(string $oldPath, string $newPath, string $file): void
    {
        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

        $folderName = "Arquivos de Mídia/";

        $directory = new DirectoryManager($file);

        if (
            Extension::tryFrom($fileExtension) === Extension::PNG ||
            Extension::tryFrom($fileExtension) === Extension::JPG ||
            Extension::tryFrom($fileExtension) === Extension::JPEG ||
            Extension::tryFrom($fileExtension) === Extension::ICO
        ) {

            $directory
                ->make($newPath, $oldPath, $folderName . 'Imagens/');

        } else if (
            Extension::tryFrom($fileExtension) === Extension::MP4 ||
            Extension::tryFrom($fileExtension) === Extension::MOV
        ) {

            $directory
                ->make($newPath, $oldPath, $folderName . 'Videos/');

        } else if (
            Extension::tryFrom($fileExtension) === Extension::MP3 ||
            Extension::tryFrom($fileExtension) === Extension::M4A
        ) {

            $directory
                ->make($newPath, $oldPath, $folderName . 'Áudios/');

        }
    }

}