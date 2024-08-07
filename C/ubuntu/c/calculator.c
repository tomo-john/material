// 電卓
#include <stdio.h>

int main(){
  float num1, num2;
  char operator;

  printf("数字2つと演算子を入力して下さい(例: 2 + 8): ");
  int inputCount = scanf("%f %c %f", &num1, &operator, &num2);

  // チェック
  printf("入力された式: %.2f %c %.2f\n", num1, operator, num2);

  if (inputCount != 3){
    printf("エラー: 入力内容に不備があります");
    return 1;
  }

  

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
      printf("エラー: 無効な演算子です: %c\n", operator);
      return 1;
  }

  printf("計算結果: %.2f\n", result);

  return 0;
}
