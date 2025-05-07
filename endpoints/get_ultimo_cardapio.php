<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$diretorio = "../uploads/";

try {
    // Pega todos os arquivos PDF do diretório
    $arquivos = glob($diretorio . "*.pdf");

    if (!$arquivos || count($arquivos) === 0) {
        echo json_encode(["success" => false, "message" => "Nenhum cardápio encontrado."]);
        exit;
    }

    // Ordena pelo tempo de modificação (mais recente primeiro)
    usort($arquivos, function ($a, $b) {
        return filemtime($b) - filemtime($a);
    });

    // Pega o nome do arquivo mais recente
    $arquivoMaisRecente = basename($arquivos[0]);

    $fileUrl = "http://localhost/PHP-PURE-API/uploads/" . urlencode($arquivoMaisRecente);
    echo json_encode(["success" => true, "file_url" => $fileUrl]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "Erro ao buscar o arquivo: " . $e->getMessage()]);
}
