<?php

require_once __DIR__ . '/vendor/autoload.php';

use FileOrganizer\Organizer\AudioFiles;
use FileOrganizer\Organizer\CompressedFiles;
use FileOrganizer\Organizer\DocumentsFiles;
use FileOrganizer\Organizer\ExecutableFiles;
use FileOrganizer\Organizer\ImageFiles;
use FileOrganizer\Organizer\ISOFiles;
use FileOrganizer\Organizer\MediaFiles;
use FileOrganizer\Organizer\SheetFiles;
use FileOrganizer\Organizer\ShortcutFiles;
use FileOrganizer\Organizer\TextFiles;
use FileOrganizer\Organizer\VideoFiles;

$downloadsDIR = __DIR__ . '/../../Downloads/';

$desktopDIR = __DIR__ . '/../../Desktop/arquivos/';

$filesDir = dir($downloadsDIR);

while ($arquivo = $filesDir->read()) {

    MediaFiles::organize($downloadsDIR, $desktopDIR, $arquivo);

    DocumentsFiles::organize($downloadsDIR, $desktopDIR, $arquivo);

    ExecutableFiles::organize($downloadsDIR, $desktopDIR, $arquivo);

    ShortcutFiles::organize($downloadsDIR, $desktopDIR, $arquivo);
}

$filesDir->close();