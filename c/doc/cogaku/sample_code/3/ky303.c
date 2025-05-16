#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main(){
  time_t ntime;
  struct tm *pst_tm1;

  ntime = time(NULL);
  pst_tm1 = localtime(&ntime);

  pst_tm1->tm_mday += 31;
  ntime = mktime(pst_tm1);

  printf("31日後は%s", ctime(&ntime));

  return 0;
}
