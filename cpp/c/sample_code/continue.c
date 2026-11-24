// continue
#include <stdio.h>

int main(){
  int i;
  for(i = 1; i <= 20; i++){
    if(i % 2 != 0){
      continue;
    }
    printf("%d: 偶数じょん\n", i);
  }
}
