# コメント

## 1.シングルラインコメント
1行だけコメントアウトできる

```c
// これはコメント
#include <stdio.h>

int main(void){
  printf ... // ここもコメント	
  ...
}
```

## 2.マルチラインコメント
複数行のわたるコメントアウトできる

```c
#include <stdio.h>

/* 1行のコメントもOK */
int main(void) {
    /* 
    この部分は複数行コメント
    何行でも書くことができるで！
    */
    int x = 10;
    printf("%d\n", x);
    return 0;
}
```

