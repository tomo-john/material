<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>🐶ben john🐶</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>ベン図ジェネレーター 🐶</h1>

        <svg id="interactive-venn" width="300" height="200">
            <defs>
                <clipPath id="clip-circle1">
                    <circle cx="100" cy="100" r="75" />
                </clipPath>
            </defs>

            <circle class="venn-diagram" cx="100" cy="100" r="75" />
            
            <circle class="venn-diagram" cx="180" cy="100" r="75" />

            <circle class="intersection" cx="180" cy="100" r="75" clip-path="url(#clip-circle1)" />
        </svg>

        <div class="button-group">
            <button id="color-button">AND</button>
            <button id="reset-button">リセット</button>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
