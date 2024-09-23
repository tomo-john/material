#include <stdio.h>

int main(){
  FILE *fp;
  char ch[50];

  fp = fopen("sample.txt", "w");
  fprintf(fp, "Hello, John!\nThis is a test file.\nI like dog.\n");
  fclose(fp);

  fp = fopen("sample.txt", "r");
  fseek(fp, 20, SEEK_SET);
  fgets(ch, sizeof(ch), fp);
  printf("20バイト目のデータ: %s\n", ch);
  fclose(fp);

  return 0;
}
