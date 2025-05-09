<?php
$dir = isset($_GET['path']) ? $_GET['path'] : '.';

if (is_dir($dir)) {
    echo "<h2>Listing of: " . htmlspecialchars($dir) . "</h2><ul>";
    foreach (scandir($dir) as $file) {
        if ($file === '.') continue;
        echo "<li>" . htmlspecialchars($file) . "</li>";
    }
    echo "</ul>";
} else {
    echo "Invalid directory: " . htmlspecialchars($dir);
}
?>
