const image = document.getElementById('image');
const step = 10; // 1回の移動量
const imageSize = 100;
let x = window.innerWidth / 2 - imageSize / 2;  // 初期位置x
let y = window.innerHeight / 2 - imageSize / 2; // 初期位置y

// 画像位置更新関数
function updatePosition(){
  image.style.left = `${x}px`;
  image.style.top = `${y}px`;
}

// キー押下時のイベントリスナー
window.addEventListener('keydown', (event) => {
  switch (event.key) {
    case 'ArrowUp': // ↑
      if (y > 0 ) y -= step;
      break;
    case 'ArrowDown': // ↓
      if ( y < window.innerHeight - imageSize ) y += step;
      break;
    case 'ArrowLeft': // ←
      if ( x > 0 ) x -= step;
      break;
    case 'ArrowRight': // →
      if ( x < window.innerWidth - imageSize ) x += step;
      break;
  }

  // 画面外にいかないように位置を修正
  x = Math.max(0, Math.min(x, window.innerWidth - imageSize));
  y = Math.max(0, Math.min(y, window.innerHeight - imageSize));
  updatePosition();
});


// 初期位置の設定
updatePosition();

