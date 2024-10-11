#include <stdio.h>

int main(){
  FILE *fp;
  fpos_t pos;
  char buffer[100];

  fp = fopen("example.txt", "r");

  fgetpos(fp, &pos); // 初期ファイル位置を取得して保存

  fseek(fp, 20, SEEK_SET); // 先頭から20バイト移動

  fgets(buffer, sizeof(buffer), fp);
  printf("読み込んだデータ: %s\n", buffer);

  fsetpos(fp, &pos); // 保存しておいた初期位置に戻る

  fgets(buffer, sizeof(buffer), fp);
  printf("戻った位置から読み込んだデータ: %s\n", buffer);

  fclose(fp);
  return 0;
}
