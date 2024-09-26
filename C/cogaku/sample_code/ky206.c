// sterror
#include <stdio.h>
#include <string.h>
#include <errno.h>

int main(int argc, char *argv[]){
  FILE *fp1;
  char *pstr;

  errno = 0;
  fp1 = fopen(argv[1], "r");
  pstr = strerror(errno);

  if(fp1 == NULL){
    printf("E=NO=%d->%s\n", errno, pstr);
    return 1;
  }

  printf("E=NO=%d->%s\n", errno, pstr);
  fclose(fp1);

  return 0;
}
