#!/bin/fish

set temporaryFilePath $argv[1]
set path $argv[2]
set url $argv[3]
set parentPID $argv[4]
set fileName $argv[5]

nvr \
  --servername /tmp/nvifsocket \
  --remote-wait +"let b:location=\"$url\" | let b:remote=\"/$path/$fileName\"" $temporaryFilePath

rm -rf /tmp/$parentPID
