// 構造体の入れ子
#include <stdio.h>

int main(){
  struct SEITO{
    int nNo;
    char sName[20];
    int nKokugo;
    int nSugaku;
    int nEigo;
    int nSyakai;
    int nRika;
  };

  struct GAKUNEN{ 
    int nNen;
    int nKumi;
    int nCount;
    struct SEITO ststudent[2];
  } stgakunen[1];

  double fave[2];

  stgakunen[0].nNen = 1;
  stgakunen[0].nKumi = 1;
  stgakunen[0].nCount = 2;

  stgakunen[0].ststudent[0].nNo = 1;
  sprintf(stgakunen[0].ststudent[0].sName, "john");
  stgakunen[0].ststudent[0].nKokugo = 80;
  stgakunen[0].ststudent[0].nSugaku = 98;
  stgakunen[0].ststudent[0].nEigo = 6;
  stgakunen[0].ststudent[0].nSyakai = 80;
  stgakunen[0].ststudent[0].nRika = 100;

  stgakunen[0].ststudent[1].nNo = 2;
  sprintf(stgakunen[0].ststudent[1].sName, "pyon");
  stgakunen[0].ststudent[1].nKokugo = 71;
  stgakunen[0].ststudent[1].nSugaku = 72;
  stgakunen[0].ststudent[1].nEigo = 71;
  stgakunen[0].ststudent[1].nSyakai = 74;
  stgakunen[0].ststudent[1].nRika = 71;

  fave[0] = (stgakunen[0].ststudent[0].nKokugo + stgakunen[0].ststudent[0].nSugaku + stgakunen[0].ststudent[0].nEigo +  stgakunen[0].ststudent[0].nSyakai + stgakunen[0].ststudent[0].nRika) / 5.0;
  fave[1] = (stgakunen[0].ststudent[1].nKokugo + stgakunen[0].ststudent[1].nSugaku + stgakunen[0].ststudent[1].nEigo +  stgakunen[0].ststudent[1].nSyakai + stgakunen[0].ststudent[1].nRika) / 5.0;

  printf("%d年%d組の%sさんの平均点は、%3.1f点です\n", stgakunen[0].nNen, stgakunen[0].nKumi, stgakunen[0].ststudent[0].sName, fave[0]);
  printf("%d年%d組の%sさんの平均点は、%3.1f点です\n", stgakunen[0].nNen, stgakunen[0].nKumi, stgakunen[0].ststudent[1].sName, fave[1]);

  return 0;
}
