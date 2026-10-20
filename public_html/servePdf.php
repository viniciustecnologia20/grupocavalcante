<?php
header('Access-Control-Allow-Origin: https://pdfjs.express');
header('Content-Type: application/pdf');

$pdfPath = 'uploads/' . $_GET['file']; // Recebe o nome do arquivo por parâmetro

if (file_exists($pdfPath)) {
    readfile($pdfPath);
} else {
    http_response_code(404);
    echo 'PDF não encontrado.';
}
?>