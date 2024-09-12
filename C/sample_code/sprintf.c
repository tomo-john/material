#include <stdio.h>

int main(){
  char buffer[100];
  int num = 2;
  char name[] = "john";

  sprintf(buffer, "Name: %s, Age: %d", name, num);

  printf("%s\n", buffer);
}
