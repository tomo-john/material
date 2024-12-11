cat file.txt | xargs touch
echo "fileA fileB" | xargs touch

echo "Error Message" 1>&2
