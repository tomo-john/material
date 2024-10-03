#include <stdio.h>
#include <time.h>

int main(){
    time_t stime, etime;
    char stinp[80];

    // 開始時刻を取得
    stime = time(NULL);
    if (stime == (time_t)-1) {
        printf("time関数を使用できません\n");
        return 1;
    }

    // 1番目の入力
    printf("1番目の文字を入力してください: ");
    scanf("%s", stinp);

    // 終了時刻を取得
    etime = time(NULL);
    printf("%sが入力されるまで: %.3f秒\n", stinp, difftime(etime, stime));

    // 2番目の入力
    stime = time(NULL); // 新しい開始時刻を取得
    printf("2番目の文字を入力してください: ");
    scanf("%s", stinp);

    // 終了時刻を取得
    etime = time(NULL);
    printf("%sが入力されるまで: %.3f秒\n", stinp, difftime(etime, stime));

    return 0;
}
