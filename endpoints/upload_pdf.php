<?php
header('Content-Type: application/json');

// Verifica se um arquivo foi enviado
if (!isset($_FILES['pdf']) || $_FILES['pdf']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode([
        'success' => false,
        'message' => 'Erro no upload do arquivo.'
    ]);
    exit;
}

// Verifica se é um PDF
$arquivo = $_FILES['pdf'];
$extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));

if ($extensao !== 'pdf') {
    echo json_encode([
        'success' => false,
        'message' => 'Apenas arquivos PDF são permitidos.'
    ]);
    exit;
}

// Define o nome e caminho do arquivo salvo
$nomeArquivo = uniqid('cardapio_', true) . '.pdf';
$caminho = __DIR__ . '/../uploads/' . $nomeArquivo;

// Move o arquivo
if (move_uploaded_file($arquivo['tmp_name'], $caminho)) {
    echo json_encode([
        'success' => true,
        'message' => 'Arquivo enviado com sucesso.',
        'file_url' => 'http://localhost/PHP-PURE-API/uploads/' . $nomeArquivo
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Erro ao mover o arquivo.'
    ]);
}
