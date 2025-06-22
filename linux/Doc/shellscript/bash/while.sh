i=1
while [ $i -le 5 ]; do
  echo "nubmer is $i"
  i=$((i + 1))
done
echo

while read -r line; do
  echo "行の内容: $line"
done < sample.txt
echo
