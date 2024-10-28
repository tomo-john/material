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

is_even(){
  if [ $(($1 % 2)) -eq 0 ]; then
    return 0 # even
  else
    return 1 # odd
  fi
}

is_even 28
if [ $? -eq 0 ]; then
  echo "even john"
else
  echo "odd john"
fi
echo

global_var="john"

dog(){
  echo "$global_var: $1"
}

dog "bow"
echo "global_var: $global_var"
echo

