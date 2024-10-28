#!/bin/bash

set -e # エラーが発生したらスクリプトを終了
echo "処理中..."
johnjohn # 意図的にエラー => スクリプトが終了
echo "これは表示されない"

