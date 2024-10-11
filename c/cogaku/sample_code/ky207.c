#include <stdio.h>
#include <string.h>

int main(int argc, char *argv[]){
  char *pstr;
  int ni;
  int nin;

  nin = atoi(argv[1]);

  for(ni = nin; ni < 20; ni++){
    pstr = strerror(ni);
    printf("E=NO=%d->%s\n", ni, pstr);
  }

  return 0;
}

