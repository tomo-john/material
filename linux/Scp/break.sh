for i in {1..5}; do
  if [ $i -eq 3 ]; then
    break
  fi
  echo "john $i"
done
