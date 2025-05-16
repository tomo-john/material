// 共用体
#include <stdio.h>

int main(){
  union TEST{
    char szCode[20];
    char szCode1[5];
    char szCode2[2];
  } unTest;

  // 変数の初期値をセット
  sprintf(unTest.szCode, "1234567890ABCDEFGHI");

  // 各メンバを表示
  printf("Code = <%.20s>\n", unTest.szCode);  // <1234567890ABCDEFGHI>
  printf("Code1 = <%.5s>\n", unTest.szCode1); // <12345>
  printf("Code2 = <%.2s>\n", unTest.szCode2); // <12>

  // Code1[0]を`Z`に変える
  unTest.szCode1[0] = 'Z';

  // 各メンバを表示
  printf("Code = <%.20s>\n", unTest.szCode);  // <Z234567890ABCDEFGHI>
  printf("Code1 = <%.5s>\n", unTest.szCode1); // <Z1234>
  printf("Code2 = <%.2s>\n", unTest.szCode2); // <Z2>
}
