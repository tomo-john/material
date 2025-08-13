// HTMLドキュメントがすべて読み込まれてから、中のコードを実行するおまじない
document.addEventListener('DOMContentLoaded', function() {

    // HTMLから操作したい要素を取得
    const andButton = document.getElementById('and-button');
    const orButton = document.getElementById('or-button');
    const xorButton = document.getElementById('xor-button');
    const resetButton = document.getElementById('reset-button');
    const svgElement = document.getElementById('venn');

    // ANDボタンがクリックされたときの処理
    andButton.addEventListener('click', function() {
        // 不要なクラスを削除
        svgElement.classList.remove('show-or', 'show-xor');
        // SVG要素に 'show-and' というクラスを追加する
        svgElement.classList.add('show-and');
    });

    // ORボタンがクリックされたときの処理
    orButton.addEventListener('click', function() {
        svgElement.classList.remove('show-and', 'show-xor');
        svgElement.classList.add('show-or');
    });

    // XORボタンがクリックされたときの処理
    xorButton.addEventListener('click', function() {
        svgElement.classList.remove('show-and', 'show-or');
        svgElement.classList.add('show-xor');
    });

    // 「リセット」ボタンがクリックされたときの処理
    resetButton.addEventListener('click', function() {
        // SVG要素から不要なクラスを削除する
        svgElement.classList.remove('show-and', 'show-or', 'show-xor');
    });
    
});
