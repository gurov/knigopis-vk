#!/bin/bash

curl http://api.knigopis.com/books/latest-notes > latest-notes-new.json
php generate-book-files.php
mv latest-notes-new.json latest-notes.json