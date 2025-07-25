<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP あいさつアプリ</title>
    <!-- 見た目を整えるためにTailwind CSSを読み込んでいます -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* フォントを設定 */
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="w-full max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl m-4">
        <div class="p-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-4">PHP あいさつアプリ</h1>
            <p class="text-gray-600 mb-6">あなたの名前を入力して送信してください。</p>

            <?php
            // --- PHPの処理はここから ---

            // このページがPOSTメソッドでリクエストされたかどうかをチェックします。
            // つまり、下のフォームの「送信」ボタンが押されたかどうかを判断しています。
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                // フォームから 'name' という名前で送られてきたデータを変数 $name に代入します。
                // $_POST は、POSTメソッドで送信されたデータが格納されるPHPの特別な変数です。
                $name = $_POST['name'];

                // 入力された名前が空っぽでないかチェックします。
                if (!empty($name)) {
                    // htmlspecialchars() はセキュリティ対策のための重要な関数です。
                    // <script>タグなどの悪意のあるHTMLタグが入力されても、それを無害な文字列に変換します。
                    // これにより、クロスサイトスクリプティング(XSS)という攻撃を防ぎます。
                    $safe_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                    
                    // 挨拶メッセージを画面に出力します。
                    echo "<div class='bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-md mb-6' role='alert'>";
                    echo "<p class='font-bold'>こんにちは、" . $safe_name . " さん！</p>";
                    echo "<p>PHPがあなたの名前を受け取りました。</p>";
                    echo "</div>";

                } else {
                    // 名前が入力されずに送信された場合のメッセージです。
                    echo "<div class='bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md mb-6' role='alert'>";
                    echo "<p class='font-bold'>名前が入力されていません。</p>";
                    echo "</div>";
                }
            }

            // --- PHPの処理はここまで ---
            ?>

            <!-- ここからHTMLの入力フォームです -->
            <!-- action="" はフォームの送信先を指定します。空の場合はこのページ自身に送信されます。 -->
            <!-- method="POST" は、データをページの裏側（URLに見えない形）で送信する方法です。 -->
            <form action="" method="POST">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">お名前:</label>
                    <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="例: 山田 太郎">
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-300">
                        送信
                    </button>
                </div>
            </form>
            
        </div>
    </div>

</body>
</html>
