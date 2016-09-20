# knigopis-vk

1. Get latest notes and save as latest-notes-new.json (use cron, vk\_up.sh)
2. Compare with latest-notes.json and put new books to books/ directory
2.1 The book file have json with description for one book
2.2 Replace old json to new json
3. Take the oldest book file and post it to vk.com (use cron, post-from-query.sh)
4. Delete oldest file
