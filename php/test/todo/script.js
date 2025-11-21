// delete.php
function delete_confirm(id) {
  const result = confirm("削除してよろしいですか？🐶 ");
  if (result === true) {
    window.location.href = `delete.php?answer=yes&id=${id}`;
  } else {
    window.location.href = "delete.php?answer=no";
  }
}

// test.php
function checkAnswer(id) {
  const result = confirm("あなたは犬派ですか？\n(OK=はい / キャンセル=いいえ ) ");
  if (result === true) {
    document.getElementById('hidden-id').value = id;
    document.getElementById('hidden-answer').value = 'yes';
    document.getElementById('check-form').submit();
  } else {
    alert("ぴょーん🐰");
  }
}

