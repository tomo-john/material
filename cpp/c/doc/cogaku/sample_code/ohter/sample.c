int main(){
  struct TEST1{
    int nNo;
    char szName[30];
    long lKin;
  };

  struct TEST1 sttest1;
  struct TEST1 sttest2[10];

  union TEST2 {
    long lNo;
    struct TEST3 {
      short sCode;
      short sRui;
    }sttest2;
  };

  union TEST2 untest1;
  union TEST2 untest2[10];
}

