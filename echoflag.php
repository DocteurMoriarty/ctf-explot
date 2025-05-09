<?php
$base = '.';

$path = isset($_GET['path']) ? realpath($_GET['path']) : $base;


if (strpos($path, realpath($base)) !== 0) {
    die("Accès interdit.");
}
if (is_file($path)) {
    echo "<h2>Fichier : " . htmlspecialchars($path) . "</h2><pre>";
    echo htmlspecialchars(file_get_contents($path));
    echo "</pre><p><a href='?path=" . urlencode(dirname($path)) . "'>Retour</a></p>";
    exit;
}

if (is_dir($path)) {
    echo "<h2>📁 Dossier : " . htmlspecialchars($path) . "</h2><ul>";
    foreach (scandir($path) as $entry) {
        if ($entry === '.') continue;
        $full = $path . DIRECTORY_SEPARATOR . $entry;
        echo "<li><a href='?path=" . urlencode($full) . "'>" . htmlspecialchars($entry) . "</a></li>";
    }
    echo "</ul>";
} else {
    echo "Chemin invalide.";
}
?>
