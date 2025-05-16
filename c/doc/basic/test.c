#include <stdio.h>

int main(){
  FILE *file = fopen("sample.txt", "r");

  if(file == NULL){
    perror("Error opening file");
    return -1;
  }

  char buffer[256]; // 読込みようのバッファを準備

  while(fgets(buffer, sizeof(buffer), file) != NULL){
    printf("Read line is: %s\n", buffer);
  }

  fclose(file);

  return 0;
}
