#include <stdio.h>
#include <string.h>

int main(){
  char szstr[40];
  char szstr1[40];
  char szstr2[40];
  char szstr3[40];
  int nrtn;

  sprintf(szstr, "AB");
  sprintf(szstr1, "A");
  sprintf(szstr2, "AB");
  sprintf(szstr3, "ABC");

  printf("strcmpで比較\n");
  nrtn = strcmp(szstr, szstr1);
  printf("%s, %s = %d\n", szstr, szstr1, nrtn);
  nrtn = strcmp(szstr, szstr2);
  printf("%s, %s = %d\n", szstr, szstr2, nrtn);
  nrtn = strcmp(szstr, szstr3);
  printf("%s, %s = %d\n", szstr, szstr3, nrtn);
}
