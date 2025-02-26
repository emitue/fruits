<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["seasons"])) {
        $selected_seasons = $_POST["seasons"];
        echo "選択した季節: " . implode(", ", $selected_seasons);
    } else {
        echo "季節が選択されていません。";
    }
}
?>
