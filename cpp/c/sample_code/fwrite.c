#include <stdio.h>

int main(){
  char ch[50] = "abcdefghijklmnopqrstuvwuxyz";
  FILE *fp;

  fp = fopen("output.txt", "w");

  fwrite(ch, 2, 4, fp);

  fclose(fp);

  fp = fopen("output.txt", "r");

  fgets(ch, 50, fp);

  printf("書き込まれた文字は: %s\n", ch);

  fclose(fp);

  return 0;
}
