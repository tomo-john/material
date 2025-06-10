#!/bin/bash

echo "🐾 おさんぽ中..."
for i in $(seq 1 20); do
  bar=$(printf "%-${i}s" "#" | tr ' ' '#')
  printf "[%-20s] %d%%\r" "$bar" "$((i * 5))"
  sleep 0.2
done
echo -e "\n🏠 家に帰ってきました！"

