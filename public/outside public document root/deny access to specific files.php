<?php

// Suppose your "public_html" folder is .
$file = './../data/test.gif';
$userCanDownloadThisFile = false; // apply your logic here

if (file_exists($file) && $userCanDownloadThisFile) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=filename.gif');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
}