#!/usr/bin/perl
# perlテスト用

print "モードを選んで下さい(0: 上書き / 1: 追記): ";
my $mode = <STDIN>;
chomp($mode);

my $open_mode = ($mode eq "0") ? ">" :
                ($mode eq "1") ? ">>" :
                die "不正なモードです";
open(my $fh, $open_mode, "log.txt") or die "File Error: $!";
print $fh "ログ出力モード: $mode $open_mode\n";
close($fh);

