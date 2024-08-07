// 電卓
#include <stdio.h>

int main(){
  float num1, num2;
  char operator;

  printf("数字2つと演算子を入力して下さい(例: 2 + 8): ");
  scanf("%f %c %f", &num1, &operator, &num2);

  // チェック
  printf("入力された式: %.2f %c %.2f\n", num1, operator, num2);

  float result;

  switch(operator){
    case '+':
      result = num1 + num2;
      break;
    
    case '-':
      result = num1 - num2;
      break;

    case '*':
      result = num1 * num2;
      break;

    case '/':
      result = num1 / num2;
      break;

    default:
      printf("演算子の入力が間違っています: %c\n", operator);
      return 0;
  }

  printf("計算結果: %.2f\n", result);

  return 0;
}
