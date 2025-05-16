// 共用体と構造体
#include <stdio.h>

int main(){
  // 変数定義
  union TEST {
    char szCode[20];
    struct TEST3{
      char szCode1[5];
      char szCode2[10];
    } stTest2;
  } unTest;

  // 変数の初期値
  sprintf(unTest.szCode, "1234567890ABCDEFGHI");

  // 各メンバを表示
  printf("Code = <%.20s>\n", unTest.szCode);           // Code = <1234567890ABCDEFGHI>
  printf("Code1 = <%.5s>\n", unTest.stTest2.szCode1);  // Code1 = <12345>
  printf("Code2 = <%.10s>\n", unTest.stTest2.szCode2); // Code2 = <67890ABCDE>

  // Code1[0]を'Z'へ変更
  unTest.stTest2.szCode1[0] = 'Z';

  // 各メンバを表示
  printf("Code = <%.20s>\n", unTest.szCode);           // Code = <Z234567890ABCDEFGHI>
  printf("Code1 = <%.5s>\n", unTest.stTest2.szCode1);  // Code1 = <Z2345>
  printf("Code2 = <%.10s>\n", unTest.stTest2.szCode2); // Code2 = <67890ABCDE> 
}

