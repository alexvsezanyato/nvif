#!/bin/fish

argparse 'l/local=' 'r/remote=' 'o/location=' -- $argv
set local $_flag_local
set remote $_flag_remote
set location $_flag_location

lftp -c "open $location; put $local -o $remote"
