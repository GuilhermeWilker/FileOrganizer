<?php

namespace FileOrganizer\Managers;

class DirectoryManager
{
    public function __construct(public string $file)
    {
    }

    public function make(string $newPath, string $oldPath, string $folderName): void
    {
        if (!is_dir($newPath . $folderName . '/')) {
            mkdir($newPath . $folderName . '/', 0777, true);
        }

        if (!file_exists($newPath . $folderName . '/' . $this->file)) {
            rename($oldPath . $this->file, $newPath . $folderName . '/' . $this->file);
        }
    }
}