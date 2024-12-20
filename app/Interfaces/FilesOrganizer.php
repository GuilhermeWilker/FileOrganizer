<?php

namespace FileOrganizer\Interfaces;

interface FilesOrganizer
{
    public static function organize(string $oldPath, string $newPath, string $file) : void;
}