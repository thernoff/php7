<?php
// Подстановка
// Множественная замена в строке
$from = ["{TITLE}", "{BODY}"];
$to = [
    "Философия", 
    "Представляется логичным, что сомнение представляет онтологический смысл жизни. Отношение к современности поразительно."
];

$template =<<<MARKER
    <!DOCTYPE html>
    <html lang='ru'>
        <head>
            <title>{TITLE}</title>
            <meta charset='utf-8'>
        </head>
        <body>
            <h2>{TITLE}</h2>
            <p>{BODY}</p>
        </body>
    </html>
MARKER;

echo str_replace($from, $to, $template);