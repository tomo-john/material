for i in 1 2 3; do
  echo "john$i"
done
echo

for i in {1..4}; do
  echo "dog$i"
done
echo

animals="dog rabbit bear"

for animal in $animals; do
  echo $animal
done
echo

for file in $(ls); do
  echo file: $file
done
echo

for file in `ls`; do
  echo file: $file
done
echo

for line in $(cat sample.txt); do
  echo line: $line
done
echo

array=("john", "super_john", "old_john")

for item in "${array[@]}"; do
  echo "item: $item"
done
echo

