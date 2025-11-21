// test.php
function checkAnswer() {
  const result = confirm("あなたは犬派ですか？\n(OK=はい / キャンセル=いいえ ) ");
  if (result === true) {
    window.location.href = "test_js.php?answer=yes";
  } else {
    window.location.href = "test_js.php?answer=no";
  }
}

// delete.php
function delete_confirm(id) {
  const result = confirm("削除してよろしいですか？🐶 ");
  if (result === true) {
    window.location.href = `delete.php?answer=yes&id=${id}`;
  } else {
    window.location.href = "delete.php?answer=no";
  }
}
