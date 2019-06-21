<?php
// Примеры использования регулярных выражений

// Преобразование адресов e-mail в html-ссылки
$text = "Адреса: user-first@mail.ru, second.user@mail.ru.";
$html = preg_replace(
        '{
            [\w \- \.]+             # имя ящика
            @
            [\w \-]+ (\.[\w \-]+)*  # имя хоста
        }xs', 
    '<a href="mailto:$0">$0</a>',
    $text
);

echo $html;
echo "<br/>";
// Преобразование гиперссылок
$text = 'Ссылка: (http://thematrix.com), www.ru?"a"=b, http://lozki.net.';
echo hrefActivate($text);

// Функция hrefActivate() заменяет ссылки из html-эквивалентами ("подчеркивает ссылки")
function hrefActivate($text) {
    return preg_replace_callback(
        '{
            (?:
                (\w+://)            # протокол с двумя слешами
                |                   # или 
                www\.               # просто начинается с www
            )
            [\w\-]+(\.[\w-]+)*      # имя хоста
        (?: : \d+)?                 # порт (не обязателен)
            [^<>"\'()\[\]\s]*       # URI (но БЕЗ кавычек и скобок)
            (?:                     # последний символ должен быть...
               (?<! [[:punct:]] )   # не пунктуационным
               | (?<= [-/&+*] )     # но допустимо окончание на -/&+*
            )
        }xis',
        function($p) {
            // Преобразуем спецсимволы в HTML-представление
            $name = htmlspecialchars($p[0]);
            // Если нет протокола, добавляем его в начало строки
            $href = !empty($p[1]) ? $name : "http://$name";
            // Формируем ссылку
            return "<a href=\"$href\">$name</a>";
        },
        $text
    );
}