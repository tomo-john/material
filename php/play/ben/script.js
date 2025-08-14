// HTMLドキュメントがすべて読み込まれてから、中のコードを実行するおまじない
document.addEventListener('DOMContentLoaded', function() {

    // HTMLから操作したい要素を取得
    const aButton = document.getElementById('a-button');
    const bButton = document.getElementById('b-button');
    const andButton = document.getElementById('and-button');
    const orButton = document.getElementById('or-button');
    const xorButton = document.getElementById('xor-button');
    const resetButton = document.getElementById('reset-button');
    const svgElement = document.getElementById('venn');

    // Aボタン
    aButton.addEventListener('click', function() {
        svgElement.classList.remove('show-a', 'show-b', 'show-and', 'show-or', 'show-xor');
        svgElement.classList.add('show-a');
    });

    // Bボタン
    bButton.addEventListener('click', function() {
        svgElement.classList.remove('show-a', 'show-b', 'show-and', 'show-or', 'show-xor');
        svgElement.classList.add('show-b');
    });

    // ANDボタン
    andButton.addEventListener('click', function() {
        svgElement.classList.remove('show-a', 'show-b', 'show-and', 'show-or', 'show-xor');
        svgElement.classList.add('show-and');
    });

    // ORボタン
    orButton.addEventListener('click', function() {
        svgElement.classList.remove('show-a', 'show-b', 'show-and', 'show-or', 'show-xor');
        svgElement.classList.add('show-or');
    });

    // XORボタン
    xorButton.addEventListener('click', function() {
        svgElement.classList.remove('show-a', 'show-b', 'show-and', 'show-or', 'show-xor');
        svgElement.classList.add('show-xor');
    });

    // 「リセット」ボタン
    resetButton.addEventListener('click', function() {
        svgElement.classList.remove('show-a', 'show-b', 'show-and', 'show-or', 'show-xor');
    });
    
});
