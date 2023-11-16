<?php

$databaseName = 'database.sqlite';

try {
    // Conectar ao banco de dados SQLite (criará o arquivo se não existir)
    $db = new SQLite3(__DIR__ . DIRECTORY_SEPARATOR . $databaseName);

    // Criar tabela 'products'
    $query = 'CREATE TABLE IF NOT EXISTS products (
                code INTEGER PRIMARY KEY AUTOINCREMENT,
                imgpath TEXT,
                name TEXT,
                price REAL,
                sales INTEGER,
                quantity INTEGER
            )';
    $db->exec($query);

    echo "Banco de dados e tabela criados com sucesso.\n";

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "\n";
} finally {
    // Fechar a conexão com o banco de dados
    if ($db) {
        $db->close();
    }
}

?>
