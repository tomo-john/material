cat file.txt | xargs touch
echo "fileA fileB" | xargs touch

echo "Error Message" 1>&2

nl file.txt
cat -n file.txt

nl -b a file.txt
cat -b file.txt
