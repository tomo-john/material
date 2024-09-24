#include <stdio.h>

int main(){
  FILE *fp = fopen("example.txt", "r");

  fseek(fp, 10, SEEK_SET);
  long pos = ftell(fp);
  printf("現在のポジション: %ld\n", pos);

  fclose(fp);
  return 0;
}
