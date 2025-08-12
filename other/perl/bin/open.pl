#!/usr/bin/perl
# perlテスト用

my $filename = "sample.txt";
open(my $fh, "<", $filename) or die "ファイルを開けません!: $!";

while (my $line = <$fh>) {
  chomp($line);
  print "読み込み内容: $line\n";
}

close($fh);
