// delete.php
function delete_confirm(id) {
  const result = confirm("削除してよろしいですか？🐶 ");
  const form = document.getElementById(`check_delete_form_${id}`);
  form.hidden_id.value = id;

  if (result) {
    form.hidden_answer.value = 'yes';
  } else {
    form.hidden_answer.value = 'no';
  }
  form.submit();
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

