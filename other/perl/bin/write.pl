#!/usr/bin/perl
# perlテスト用

my $filename = "output.txt";

open(my $fn, ">", $filename) or die "File Error: $!";
print $fn "こんにちは、じょん\n";
close($fn);
