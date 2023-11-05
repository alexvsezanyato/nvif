#!/bin/fish

read uri
string match -r '(?<url>(?<protocol>\w+)://(?<user>\w+):(?<password>\w+)@(?<host>\w+))/(?<path>.*)' $uri> /dev/null

set pid $fish_pid
set fileName $argv[1]

set temporaryDirectory /tmp/$pid/$path
set temporaryFilePath $temporaryDirectory/$fileName
set remoteFilePath /$path/$fileName
set backupFileDirectory ~/.lftp/backup/$user@$host/$path
set backupFilePath $backupFileDirectory/$fileName
 
mkdir -p $temporaryDirectory
lftp -c "open $url; get $remoteFilePath -o $temporaryFilePath"

if test ! -e $backupFilePath
  mkdir -p $backupFileDirectory
  cp $temporaryFilePath $backupFilePath
end
 
~/.lftp/edit/background.fish $temporaryFilePath $path $url $pid $fileName 1> /dev/null 2>&1 &
