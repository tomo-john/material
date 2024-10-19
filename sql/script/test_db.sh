#!/bin/bash
# sqlテスト用

# 変数設定
DB_NAME='scp'
DB_USER='tomo'
SQL_FILE='./file.sql'

# psqlコマンドでSQLファイル実行
psql -U $DB_USER -d $DB_NAME -f $SQL_FILE

