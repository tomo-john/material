#include <stdio.h>
#include <time.h>

int main(){
  clock_t stime;
  char stinp[80];

  stime = clock();
  if(stime < (clock_t)0){
    printf("clock関数を使用できません\n");
    return 1;
  }

  printf("1番目の文字を入力してください: ");
  scanf("%s", stinp);
  printf("%sが入力されるまで: %.3fsec\n", stinp, 
          (float)((clock()-stime)/CLOCKS_PER_SEC)
        );

  printf("2番目の文字を入力してください: ");
  scanf("%s", stinp);
  printf("%sが入力されるまで: %.3fsec\n", stinp, 
          (float)((clock()-stime)/CLOCKS_PER_SEC)
        );
 
 return 0;
}
