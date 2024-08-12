#include <iostream>
#include <string>

int main () {
  std::string name;

  std::cout << "名前を入力して下さい: ";
  std::cin >> name;

  std::cout << "こんにちは! " << name << " さん!!" << std::endl;

  return 0;

}

