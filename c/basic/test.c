#include <stdio.h>

int main(){
  FILE *file;

  file = fopen("sample.txt", "r");

  if(file == NULL){
    perror("Error opening file");
    return -1;
  }

  int ch = fgetc(file);
  while(ch != EOF){
    putchar(ch);
    ch = fgetc(file);
  }

  fclose(file);

  return 0;
}
