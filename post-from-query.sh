#!/bin/bash

b=$(ls -bt1 --color="no" books/ | tail -1);
if [ -f ./books/$b ]; then
    php vk-post.php $b
fi

