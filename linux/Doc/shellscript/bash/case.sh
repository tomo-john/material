# $animalの値に応じて分岐
animal="dog"

case $animal in
  "bear")
    echo "くま"
    ;;
  "dog")
    echo "いぬ"
    ;;
  *)
    echo "未知の生物"
    ;;
esac
