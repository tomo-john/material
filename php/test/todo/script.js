// test.php
function checkAnswer() {
  const result = confirm("あなたは犬派ですか？\n(OK=はい / キャンセル=いいえ ) ");
  if (result === true) {
    window.location.href = "test_js.php?answer=yes";
  } else {
    window.location.href = "test_js.php?answer=no";
  }
}
