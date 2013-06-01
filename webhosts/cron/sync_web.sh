#!/bin/bash
# set paths / dirs
_paths="/opt/joomla-173/"
#/var/lib/php/session/
#/home/vivek/ \
#/projects/scripts/*.pl
 
# binary file name
_unison=/usr/bin/unison
 
# server names 
# sync server1.cyberciti.com with rest of the server in cluster
_rserver="10.1.1.30 10.1.1.39"
#_rserver="10.1.1.31"
 
# sync it
for r in ${_rserver}
do
	for p in ${_paths}
	do
        	${_unison} Sync -batch "${p}"  "ssh://${r}/${p}"
	done
done
