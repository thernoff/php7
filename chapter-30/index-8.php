<?php
/**
 * Класс ReflectionClass
 * Отражение ReflectionClass - самое обширное из всех. Объект-отражение хранит в себе информацию о некотором классе, описанном в программе.
 * class ReflectionClass implements Reflector {
 *  public function __construct(string $name);
 *  public string getName(); // имя класса
 *  // метод getModifiers() возращает целое число (битовую маску). Установленные биты соответствуют различным модификаторам доступа,
 *  // указанным перед именем класса при его определении (например, abstract, final)
 *  public int getModifiers();
 *  public bool isInternal(); // встроенный класс?
 *  public bool isUserDefined(); // определен пользователем?
 *  public string getFileName(); // файл, где определен класс
 *  public int getStartLine(); // где начинается
 *  public int getEndLine(); // где заканчивается описание
 *  public string getDocComment(); // документация-комментарий
 *  public mixed getConstants(string $name);
 *  public array getConstants();
 *  public ReflectionMethod getConstructor();
 *  public ReflectionMethod getMethod(string $name);
 *  public ReflectionMethod[] getMethods();
 *  public ReflectionProperty getProperty(string $name);
 *  public ReflectionProperty getProperties();
 *  public array getStaticProperties();
 *  public array getDefaultProperties();
 *  public ReflectionClass[] getInterfaces();
 *  public ReflectionClass getParentClass();
 *  // Функция-член isInstatniable() вернет истинное значение, если объект текущего класса можно создать при помощи оператора new
 *  // (т.е. класс не является интерфейсом и не абстрактный)
 *  public bool isInstantiable();
 *  public bool isInterface(); // это интерфейс, а не класс?
 *  public bool isFinal(); // класс нельзя наследовать?
 *  public bool isAbstract(); // класс абстрактен?
 *  // Метод isInstance() позволяет проверить, является ли объект, указанный в его параметрах, экземпляром класса,
 *  // которому соответствует отражение
 *  public bool isInstance($object);
 *  // Функция-член isSubclassOf() проверяет, является ли текущий класс производным по отношению к тому, чье отражение (или имя)
 *  // указано в ее параметрах
 *  public bool isSubclassOf(mixed $class);
 *  public bool isIterateable();
 *  public bool implementsInterface(mixed $ifaceName);
 *
 *  public newInstance(...);
 *  public string __toString(); // отладочное представление
 * }
 */

 ## Отражение класса
 $clsReflectionException = new ReflectionClass('ReflectionException');
 //echo "<pre>", $clsReflectionException, "</pre>";

 ## Для того чтобы получить текстовое представление модификаторов
 $arrModifierNames = Reflection::getModifierNames($clsReflectionException->getModifiers());
 echo "<pre>", var_dump($arrModifierNames), "</pre>";