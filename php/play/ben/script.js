// HTMLドキュメントがすべて読み込まれてから、中のコードを実行するおまじない
document.addEventListener('DOMContentLoaded', function() {

    // HTMLから操作したい要素を取得
    const andButton = document.getElementById('and-button');
    const orButton = document.getElementById('or-button');
    const resetButton = document.getElementById('reset-button');
    const svgElement = document.getElementById('venn');

    // 「AND」ボタンがクリックされたときの処理
    andButton.addEventListener('click', function() {
        // 不要なクラスを削除
        svgElement.classList.remove('show-or');
        // SVG要素に 'show-and' というクラスを追加する
        svgElement.classList.add('show-and');
    });

    // 「OR」ボタンがクリックされたときの処理
    orButton.addEventListener('click', function() {
        // 既存のANDクラスは外す
        svgElement.classList.remove('show-and');
        // ORクラスを追加
        svgElement.classList.add('show-or');
    });;

    // 「リセット」ボタンがクリックされたときの処理
    resetButton.addEventListener('click', function() {
        // SVG要素から不要なクラスを削除する
        svgElement.classList.remove('show-and', 'show-or');
    });
    
});
