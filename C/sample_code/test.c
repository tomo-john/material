// テスト用
#include <stdio.h>

int main(void){
  char c1[] = "john";
  char c2[] = {'j', 'o', 'h', 'n', '\0'};

  printf("c1: %s\n", c1); // john
  printf("c2: %s\n", c2); // john

  printf("c2[2] : %c\n", c2[2]);  // h
  printf("&c2[2]: %s\n", &c2[2]); // hn => c2[2]以降が表示される

  char *p1 = &c2[0];
  char *p2 = &c2[2];

  printf("&c2[0] のアドレスの値: %s\n", p1); // john
  printf("&c2[2] のアドレスの値: %s\n", p2); // hn

  printf("&c2 のアドレス       : %p\n", &c2);    // 0x7fffe660ff73
  printf("&c2[0] のアドレス    : %p\n", &c2[0]); // 0x7fffe660ff73
  printf("&c2[2] のアドレス    : %p\n", &c2[2]); // 0x7fffe660ff75
}
