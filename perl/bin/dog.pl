#!/usr/bin/perl
# perlテスト用

print "何か入力をしてください(入力後にEnter): ";
my $input = <STDIN>; # 入力を受け取る
chomp($input);       # 改行コードを取り除く

print "こんにちは。入力内容は: $input です。\n";

