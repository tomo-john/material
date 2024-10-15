#include <stdio.h>
#include <string.h>

int main(){
  char szstr[20];
  char *pstr;

  sprintf(szstr, "ABCDE123ABCDEFGHIJK");

  printf("<%s>の中から<E>を検索\n", szstr);
  pstr = strchr(szstr, 'E');
  printf("%s\n", pstr);

  printf("\n<%s>の中から<EFG>を検索\n", szstr);
  pstr = strstr(szstr, "EFG");
  printf("%s\n", pstr);

  return 0;
}
