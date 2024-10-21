#include <stdio.h>

int main(){
  char name[50];

  printf("Enter your name.: ");

  if(fgets(name, sizeof(name), stdin) != NULL){
    printf("Hello, %s", name);
  } else {
    printf("Error reading input.\n");
  }

  return 0;
}
