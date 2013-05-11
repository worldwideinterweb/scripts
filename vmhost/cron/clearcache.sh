#!/bin/sh
sync; echo 3 > /proc/sys/vm/drop_caches
#0 * * * * /root/clearcache.sh
