#include <stdio.h>

#define mul(x, y)((x)*(y))
#define dispout(dt)printf("<%s>\nTEST", dt) 

int main(){
  char szstr[] = "ABC";
  int ni, ni1, ni2;

  ni1 = 10;
  ni2 = 20;
  ni = mul(ni1, ni2);
  printf("%d * %d = %d\n", ni1, ni2, ni);

  dispout(szstr);
}
