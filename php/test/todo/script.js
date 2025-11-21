// delete.php
function delete_confirm(id) {
  const result = confirm("削除してよろしいですか？🐶 ");
  if (result === true) {
    document.getElementById('hidden_id').value = id;
    document.getElementById('hidden_answer').value = 'yes';
    document.getElementById('check_delete_form').submit();
  } else {
    document.getElementById('hidden_answer').value = 'no';
    document.getElementById('check_delete_form').submit();
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

