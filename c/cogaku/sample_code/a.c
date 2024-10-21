#include <stdio.h>
#include <string.h>
#include <time.h>
#define F_NAME "TYPING.LOG"
#define MAX 10

int main(){
  char *mondai[MAX] = {"assert", "break", "continue", "double", "extern", "float", "getchar", "include", "long", "malloc"};
  char input[81];
  int toi = 0;
  time_t s_time, e_time;
  FILE *fp;

  s_time = time(NULL);
  while(toi < MAX){
    puts(mondai[toi]);
    gets(input);
    if (strcmp(input,mondai[toi])==0)
      toi++;
  }
  e_time = time(NULL);

  fp = fopen(F_NAME, "a");
  fprintf(fp, "経過時間 %10.2f 秒 %s",
    difftime(e_time, s_time), ctime(&e_time));
  fclose(fp);
}
