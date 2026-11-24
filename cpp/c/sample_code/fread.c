#include <stdio.h>

int main(){
  char ch[50] = "abcdefghijklmnopqrstuvwuxyz";
  FILE *fp;

  // ファイルを "w" モードで開いて、書き込み
  fp = fopen("output.txt", "w");

  // 2バイトを4回書き込む（合計8バイト）
  fwrite(ch, 2, 4, fp);

  // ファイルを閉じる
  fclose(fp);

  // ファイルを "r" モードで開いて、読み込み
  fp = fopen("output.txt", "r");

  // ファイルから読み込む（注意: ヌル終端がない可能性があるので、範囲に注意）
  fread(ch, 1, 8, fp);

  // 読み込んだ8バイトのデータにヌル終端を追加
  ch[8] = '\0';

  printf("書き込まれた文字は: %s\n", ch);

  // ファイルを閉じる
  fclose(fp);

  return 0;
}
