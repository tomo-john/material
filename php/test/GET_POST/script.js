function goGet(data) {
  const result = confirm("GETで送信しますか？🐶");
  if (result === true) {
    window.location.href = `receive.php?data=${data}`;
  } else {
    alert("キャンセルしました🐶");
  }
}

function goPost(data) {
  const result = confirm("POSTで送信しますか？🐶");
  if (result === true) {
    document.getElementById('hidden_data').value = data;
    document.getElementById('hidden_form').submit();
  } else {
    alert("キャンセルしました🐶");
  }
}
