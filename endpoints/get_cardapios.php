<?php
$diretorio = '../uploads';
$arquivos = [];

if (is_dir($diretorio)) {
    $todos = scandir($diretorio);

    foreach ($todos as $arquivo) {
        if (pathinfo($arquivo, PATHINFO_EXTENSION) === 'pdf') {
            $arquivos[] = [
                'nome' => $arquivo,
                'url' => "http://localhost/uploads/$arquivo"
            ];
        }
    }

    echo json_encode([
        'success' => true,
        'cardapios' => $arquivos
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Diretório não encontrado.'
    ]);
}
