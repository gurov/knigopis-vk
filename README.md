# knigopis-vk

1. Get latest notes and save as latest-notes-new.json (use cron, vk\_up.sh)
2. Compare with latest-notes.json and put new books to books/ directory
3. The book file have json with description for one book
4. Replace old json to new json
5. Take the oldest book file and post it to vk.com (use cron, post-from-query.sh)
6. Delete oldest file
