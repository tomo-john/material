// 構造体
#include <stdio.h>

int main(){
  // 構造体宣言
  struct SEITO{
    int nNo;
    char sName[20];
    int nKokugo;
    int nSugaku;
    int nEigo;
    int nSyakai;
    int nRika;
  };

  // 変数定義
  struct SEITO student[2] =
    {
      {1, "john", 80, 65, 20, 33, 100},
      {2, "pyon", 75, 65, 80, 60, 90}
    };

  double fave[2];
  fave[0] = (student[0].nKokugo + student[0].nSugaku + student[0].nEigo + student[0].nSyakai + student[0].nRika) / 5.0;
  fave[1] = (student[1].nKokugo + student[1].nSugaku + student[1].nEigo + student[1].nSyakai + student[1].nRika) / 5.0;

  printf("%sさんの平均点は、 %3.1f点です\n", student[0].sName, fave[0]);
  printf("%sさんの平均点は、 %3.1f点です\n", student[1].sName, fave[1]);

  return 0;
}
