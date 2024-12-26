#!/bin/bash

DIR=wk

# 作業ディレクトリ初期化
if [ -d $DIR ]; then
  rm -r $DIR
fi

mkdir $DIR
cd $DIR

touch a
