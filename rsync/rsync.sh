#!/bin/bash

rsync -a --info=progress2  --exclude='dist' --exclude='blog_backend/' --delete \
 /home/manhee/Disk/Projects/a77-new-life/ manhee@angara77.com:/home/manhee/a77-new-life/;

