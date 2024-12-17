<?php

namespace FileOrganizer\Enums;

enum Extension: string {
    case PDF = 'pdf';
    case DOCX = 'docx';
    case DOC = 'doc';
    case TXT = 'txt';

    case MP3 = 'mp3';
    case M4A = 'm4a';
    case MP4 = 'mp4';
    case MOV = 'mov';

    case PNG = 'png';
    case JPG = 'jpg';
    case JPEG = 'jpeg';
    case ICO = 'ico';

    case XLSX = 'xlsx';
    case XLS = 'xls';

    case EXE = 'exe';
    case MSI = 'msi';

    case ZIP = 'zip';
    case RAR = 'rar';

    case ISO = 'iso';
}