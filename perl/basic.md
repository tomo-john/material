# perlの基本構文(入門編)

## Hello, World!

```perl
#!/usr/bin/perl
print "Hello, World!\n";
```

- `#!/usr/bin/perl`はこのスクリプトをPerlで動かす宣言(WSL2には標準でインストールされてた)
- `print`は画面に文字を表示する命令

perlでは文の終わりに`;`をつける

## 変数

Perlでは、変数の頭に記号をつける

- `$`: スカラー変数(数値・文字列など1つの値)
- `@`: 配列(リスト)
- `%`: ハッシュ(連想配列)

```perl
my $name = "john";
my $age = "10";

my @colors = ("red", "blue", "green");
my %animal = ("dog" => "🐶", "cat" => "🐱");
```

- `my`は「この変数はローカル(このスコープ内だけで使う)」という意味

