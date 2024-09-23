// fseek
#include <stdio.h>

FILE *Fp1; // グローバル変数

void disp_list(void);
void change_data(int, char);

int main(){
  char szfname1[] = "ky201.dat";
  char c_change;
  int ni;

  Fp1 = fopen(szfname1, "r+b");
  if(Fp1 == NULL){
    printf("ファイル1のオープンに失敗");
    return 1;
  }

  disp_list(); // 一覧表示

  printf("何番目のデータを書き換えますか？\n");
  scanf("%d%*[^\n]", &ni);
  scanf("%*c");

  printf("置き換える文字は？");
  scanf("%c%*[^\n]", &c_change);
  scanf("%*c");

  printf("%d番目の文字を%cに置き換えます\n", ni, c_change);

  change_data(ni, c_change); // データ変更

  printf("\n置き換えた結果です\n");
  disp_list();

  fclose(Fp1);
}

void disp_list(void){
  char szdata[81];

  fseek(Fp1, 0L, SEEK_SET);
  fgets(szdata, 81, Fp1);
  printf("ファイルの内容->%s\n", szdata);
}

void change_data(int npos, char cdata){
  fseek(Fp1, (long)(npos-1), SEEK_SET);
  fputc(cdata, Fp1);
}
