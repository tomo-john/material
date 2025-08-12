// HTMLドキュメントがすべて読み込まれてから、中のコードを実行するおまじない
document.addEventListener('DOMContentLoaded', function() {

    // HTMLから操作したい要素を取得
    const colorButton = document.getElementById('color-button');
    const resetButton = document.getElementById('reset-button');
    const svgElement = document.getElementById('interactive-venn');

    // 「色を付ける」ボタンがクリックされたときの処理
    colorButton.addEventListener('click', function() {
        // SVG要素に 'show-intersection' というクラスを追加する
        svgElement.classList.add('show-intersection');
    });

    // 「リセット」ボタンがクリックされたときの処理
    resetButton.addEventListener('click', function() {
        // SVG要素から 'show-intersection' というクラスを削除する
        svgElement.classList.remove('show-intersection');
    });
    
});
