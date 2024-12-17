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

    $textFiles = new TextFiles($downloadsDIR, $desktopDIR, $arquivo);
    $textFiles();

    $audioFiles = new AudioFiles($downloadsDIR, $desktopDIR, $arquivo);
    $audioFiles();

    $videoFiles = new VideoFiles($downloadsDIR, $desktopDIR, $arquivo);
    $videoFiles();

    $imageFiles = new ImageFiles($downloadsDIR, $desktopDIR, $arquivo);
    $imageFiles();

    $sheetFiles = new SheetFiles($downloadsDIR, $desktopDIR, $arquivo);
    $sheetFiles();

    $executableFiles = new ExecutableFiles($downloadsDIR, $desktopDIR, $arquivo);
    $executableFiles();

    $compressedFiles = new CompressedFiles($downloadsDIR, $desktopDIR, $arquivo);
    $compressedFiles();

    $isoFiles = new IsoFiles($downloadsDIR, $desktopDIR, $arquivo);
    $isoFiles();

}
$filesDir->close();