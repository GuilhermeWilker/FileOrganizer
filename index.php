<?php

require_once __DIR__ . '/vendor/autoload.php';

use FileOrganizer\Organizer\AudioFiles;
use FileOrganizer\Organizer\CompressedFiles;
use FileOrganizer\Organizer\ExecutableFiles;
use FileOrganizer\Organizer\ImageFiles;
use FileOrganizer\Organizer\ISOFiles;
use FileOrganizer\Organizer\SheetFiles;
use FileOrganizer\Organizer\TextFiles;
use FileOrganizer\Organizer\VideoFiles;

$downloadsDIR = __DIR__ . '/../../Downloads/';

$desktopDIR = __DIR__ . '/../../Desktop/arquivos/';

$filesDir = dir($downloadsDIR);

while ($arquivo = $filesDir->read()) {

    new TextFiles($downloadsDIR, $desktopDIR, $arquivo)->organize();

    new AudioFiles($downloadsDIR, $desktopDIR, $arquivo)->organize();

    new VideoFiles($downloadsDIR, $desktopDIR, $arquivo)->organize();

    new ImageFiles($downloadsDIR, $desktopDIR, $arquivo)->organize();

    new SheetFiles($downloadsDIR, $desktopDIR, $arquivo)->organize();

    new ExecutableFiles($downloadsDIR, $desktopDIR, $arquivo)->organize();

    new CompressedFiles($downloadsDIR, $desktopDIR, $arquivo)->organize();

    new IsoFiles($downloadsDIR, $desktopDIR, $arquivo)->organize();

}

$filesDir->close();