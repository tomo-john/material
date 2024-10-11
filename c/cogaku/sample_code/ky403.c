#define TEST

#include <stdio.h>

int main(){
  char sztext[80];

#ifdef TEST
  sprintf(sztext, "DEBUG");
#else
  sprintf(sztext, "RELEASE");
#endif

  printf("%s\n", sztext);

  return 0;
}
