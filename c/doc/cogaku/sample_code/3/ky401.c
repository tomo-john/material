#include <stdio.h>
#include <stdlib.h>
#include <assert.h>

int main(int argc, char *argv[]){
  assert(argc > 1);
  printf("%sで実行されました\n", argv[1]);

  return 0;
}
