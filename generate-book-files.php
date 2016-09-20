<?php

$latestBooksNew = json_decode(file_get_contents(__DIR__ . '/latest-notes-new.json'));
$latestBooksOld = json_decode(file_get_contents(__DIR__ . '/latest-notes.json'));

foreach ($latestBooksNew as $key => $book) {
    if (!array_key_exists($key, $latestBooksOld)) {
        file_put_contents(__DIR__ . '/books/' . $key, json_encode($book));
    }
}
