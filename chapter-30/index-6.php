<?php
/**
 * ReflectionFunction
 * Одно из наиболее простых и понятных отражений - это отражение функции. Класс обладает следующим интерфейсом (имеется в виду набор методов):
 * class ReflectionFunction implements Reflector {
 *  // принимает имя функции, для которой создается отражение, если функция не существует, то возбуждается исключение ReflectionException,
 *  // которое можно перехватить
 *  public __construct(string $name);
 *  public string getName();
 *  // методы isInternal() и isUserDefined() возвращают признак того, является ли функция встроенной или же была определена пользователем
 *  public bool isInternal();
 *  public bool isUserDefined();
 *  // методы getFileName(), getStartLine() и getEndLine() указывают, в каком файле и на каких строках находится определение функции
 *  public string getFileName();
 *  public int getStartLine();
 *  public int getEndLine();
 *  // getDocComment() возвращает содержимое многострочного комментария, который присутствовал в исходном файле непосредственно перед определением функции
 *  public string getDocComment();
 *  // getStaticVariables() возвращает массив всех статических переменных функций и соответствующие им значения, которые они имеют в текущий момент.
 *  // Имена переменных хранятся в ключах массива.
 *  public array getStaticVariables();
 *  // Метод invoke() позволяет вызвать функцию для которой создано отражение, с произвольным списком аргументов.
 *  public mixed invoke(...);
 *  public string __toString();
 *  // Метод returnsReference() вернет true, если функция возвращает ссылку, т.е. если при ее описании в заголовке использовался символ &.
 *  public bool returnsReference();
 *  // Метод getParameters() возвращает список, хранящий информацию обо всех параметрах функции. При этом каждый параметр также представлен
 *  // своим отражением - объектом класса ReflectionParameter.
 *  public ReflectionParameter[] getParameters();
 * }
 */

 ## Перехват исключения отражения
 try {
   $obj = new ReflectionFunction("spoon");
 } catch (ReflectionException $e) {
   echo "Исключение: ", $e->getMessage(); // Исключение: Function spoon() does not exist
 }

 ## Документирование
 /**
  * Документация для следующей
  * функции (после "/**" не должно быть пробелов!)
  */
function func() {

}

$obj = new ReflectionFunction('func');
echo "<pre>" . $obj->getDocComment() . "</pre>";
