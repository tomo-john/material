#!/bin/bash

trap 'echo "エラーが発生しました"; exit 1' ERR

echo "処理中..."
johnjohn # エラーが発生するとtrapが発動
echo "これは表示されない"

