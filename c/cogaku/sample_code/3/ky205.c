// perror
#include <stdio.h>

int main(int argc, char *argv[]){
  FILE *fp1;

  fp1 = fopen(argv[1], "r");
  if(fp1 == NULL){
    perror("ファイルなし");
    return 1;
  }

  perror("ファイルあり");
  fclose(fp1);

  return 0;
}
