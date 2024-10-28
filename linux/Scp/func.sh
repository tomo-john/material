greet(){
  echo "Hello, $1!"
}

greet "john"
greet "World"
echo

test(){
  echo "合計: $(($1 + $2 + $3))"
  echo "全引数: $@"
  echo "引数の数: $#"
  echo "スクリプト名: $0"
}
test 1 2 3
echo

