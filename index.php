<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';

use FileOrganizer\Organizer\ExecutableFiles;
use FileOrganizer\Organizer\DocumentsFiles;
use FileOrganizer\Organizer\ShortcutFiles;
use FileOrganizer\Organizer\MediaFiles;

$directories = [
    DOWNLOADS,
    DOCUMENTS,
    DESKTOP
];

$masterDIR = __DIR__ . '/../../Desktop/Arquivos/';

foreach ($directories as $dir) {

    $filesDir = dir($dir);

    while ($arquivo = $filesDir->read()) {

        MediaFiles::organize($dir, $masterDIR, $arquivo);

        DocumentsFiles::organize($dir, $masterDIR, $arquivo);

        ExecutableFiles::organize($dir, $masterDIR, $arquivo);

        ShortcutFiles::organize($dir, $masterDIR, $arquivo);
    }

    $filesDir->close();
}