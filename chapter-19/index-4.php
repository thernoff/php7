<?php
// Построение timestamp()
// Во всех трех случаях будет получена следующая строка: Jan-01-2005
echo date("M-d-Y", mktime(0,0,0,1,1,2005)); // правильная дата
echo "<br/>";
echo date("M-d-Y", mktime(0,0,0,12,32,2004)); // неправильная дата
echo "<br/>";
echo date("M-d-Y", mktime(0,0,0,13,1,2004)); // неправильная дата
echo "<br/>";