<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["product_image"]) && $_FILES["product_image"]["error"] == 0) {
        $upload_dir = "uploads/"; // 保存先ディレクトリ
        $filename = basename($_FILES["product_image"]["name"]); // ファイル名
        $target_file = $upload_dir . $filename; // フルパス

        // 画像の種類をチェック（セキュリティ対策）
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ["jpg", "jpeg", "png", "gif"];

        if (in_array($imageFileType, $allowed_types)) {
            // ファイルをアップロード
            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
                echo "ファイルがアップロードされました: <a href='$target_file'>$filename</a>";
            } else {
                echo "ファイルのアップロードに失敗しました。";
            }
        } else {
            echo "許可されていないファイル形式です。";
        }
    } else {
        echo "ファイルが選択されていないか、エラーが発生しました。";
    }
}
?>
