<?php 
namespace MyProject\MadaZastra;
?>
<head>
    <title>description</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <meta name="description" content="Сайт об HTML и создании сайтов"> 
    <title>height</title>
    <style>
        .layer {
            /*height: 600px; /* Высота блока */
            width: 800px; /* Ширина блока */
            /*overflow: scroll; /* Добавляем полосы прокрутки */
            /*background: #fc0; /* Цвет фона */
            padding: 7px; /* Поля вокруг текста */
            border: 1px solid #333; /* Параметры рамки */
        }
    </style>
</head> 

<html>
    <body>
        <div class="layer">
            <p>
                <b>Класс</b> - это шаблон кода. который используется для создания объектов.                    
            </p>
            <p>
                <b>Объект</b> - это данные,
                которые структурируются в соответствии с шаблоном, определенным в классе.
                При этом говорят, что объект - это экземпляр класса. Его тип определяется классом
            </p>
            <p>
                <b>new</b> - оператор 
            </p>
            <p>
                Спецификаторы -> Ключевые слова - <b>public</b>, <b>protected</b> и <b>private</b>.
            </p>
            <p>
                В классах можно определять специальные переменные, которые называются
                <b>свойствами</b>. Свойство, которое называется также переменной-членом (member
                variaЬle), содержит данные, которые могут изменяться от одного объекта к другому.
            </p>
            <p> На самом деле в РНР необязательно объявлять все свойства в классе. Свойства
                можно динамически добавлять к объекту следующим образом.<br />
                $productl -> arЬitraryAddition = "Доnолнительньm параметр";
            </p>
            <p> Поскольку РНР позволяет определять свойства динамически, вы не получите предупреждения,
                если забудете, как называется имя свойства, или сделаете в нем опечатку.<br />
                Например : вместо $productl -> titl<b>e</b> = ""; Можно написать : $productl -> titl = ""; и создать новое свойство.
            </p>
            <p>
                Псевдопеременная <b>$this</b>. Она представляет собой механизм  посредством
                которого из кода класса можно обратиться к экземпляру объекта
            </p>
            <p>
                <b>__сопstruсt()</b> Метод конструктора вызывается при создании объекта. Его можно использовать,
                чтобы все настроить, обеспечить определенные значения необходимых
                свойств и выполнить всю предварительную работу.
            </p>
            
            <p>
                <b>Наследование</b> - это механизм, посредством которого один или несколько классов
                можно получить из некоторого базового класса.
            </p>
            
            <p>
                <b>extends</b> - ключевое слово.
            </p>
            
            <p> При использовании старого синтаксиса вызов конструктора родительского класса был привязан к имени конкретного класса, 
                например parent::ShopProduct(); В случае изменения иерархии классов это часто приводило к проблемам. Большинство ошибок 
                возникало из-за того, что программисты, после непосредственного изменения "родителя" класса, забывали обновить сам конструктор.
            </p>
            
            <p>
                Чтобы обратиться к методу в контексте класса, а не объекта, следует использовать
                символы "::" . а не "->" . Поэтому конструкция parent:: __construct() означает
                следующее: "Вызвать мeтoд __construct() родительского класса".
            </p>
            
            <p>
                <b>Статические методы</b> - это функции, используемые в контексте класса. Они
                сами не могут получать доступ ни к каким обычным свойствам класса, потому что
                такие свойства принадлежат объектам . Однако из статических методов можно обращаться
                к статическим свойствам. И если вы измените статическое свойство, то
                все экземпляры этого класса смогут получать доступ к новому значению.
            </p>
            
            <p><b> А зачем вообще нужны статические методы или свойства?</b></p>
            <ul>
                <li>Во-первых. они доступны из любой точки
                    сценария (при условии, что у вас есть доступ к классу). Это означает, что вы можете
                    вызывать функции, не передавая экземпляр класса от одного объекта другому или,
                    что еще хуже, сохраняя экземпляр объекта в глобальной переменной. </li>
                <li>Во-вторых, статическое свойство доступно каждому экземпляру объекта этого класса. Поэтому
                    можно определить значения, которые должны быть доступны всем объектам данного
                    типа.  </li>
                <li>И наконец, в-третьих, сам факт, что не нужно иметь экземпляр класса
                    для доступа к его статическому свойству или методу, позволит избежать создания
                    экземпляров объектов исключительно ради вызова простой функции. </li>
            </ul>
            
            <p>
                В РНР 5 можно определять постоянные свойства внутри класса. Как и глобальные
                константы, константы класса нельзя изменять после того, как они были определены.
                Постоянное свойство объявляют с помощью ключевого слова <b>const</b>. В отличие
                от обычных свойств , перед именем постоянного свойства не ставится знак
                доллара. По принятому соглашению для них часто выбираются имена, состоящие
                только из прописных букв.<br />
                Постоянные свойства моrут содержать только значения, относящиеся к элементарному
                типу. Константе нельзя присвоить объект. Как и к статическим свойствам,
                доступ к постоянным свойствам осуществляется через класс, а не через экземпляр
                объекта. Поскольку константа определяется без знака доллара, при обращении к
                ней также не требуется использовать никакой символ впереди
            </p>
            
            <p>
                Введение <b>абстрактных классов</b> стало одним из главных изменений в РНР5. 
                Экземпляр абстрактного класса нельзя создать. Вместо этого в нем определяется
                (и. возможно, частично реализуется) интерфейс для любого класса, который может
                его расширить.
            </p>
            
            <p>
                Как известно, в абстрактном классе допускается реализация некоторых методов,
                не объявленных абстрактными. В отличие от них, <b>интерфейсы</b> - это чистой воды
                шаблоны. С помощью интерфейса можно только определить функциональность,
                но не реализовать ее. Для объявления интерфейса используется ключевое слово
                interface. В интерфейсе могут находиться только объявления методов, но не тела
                этих методов.
            </p>
            <p>
                В любом классе, поддерживающем
                этот интерфейс, нужно реализовать все методы. определенные в интерфейсе; в противном
                случае класс должен быть объявлен как абстрактный.
            </p>
            <p>
                <b>Трейты:</b><br />
                По сути, <b>трейты</b> напоминают классы, для которых нельзя создать экземпляр
                объекта, но которые можно включить в другие классы. Поэтому любое свойство (или
                метод). определенное в трейте, становится частью того класса, в который этот трейт
                включен. При этом трейт изменяет структуру этого класса, но не меняет его тип.
                Можно считать трейты своего рода оператором i nc lude, действие которого распространяется
                только на конкретный класс.
            </p>
            <p>
                <b>Завершенные классы и методы:</b><br />
                Если вы создали необходимый уровень функциональности для
                класса и считаете, что его переопределение может только повредить идеальной работе
                программы, используйте ключевое слово <b>final</b>.
                Ключевое слово <b>final</b> позволяет положить конец наследованию
                <b>final</b> работает аналогично public или private.
            </p>
            <p><b>Методы перехватчики</b></p>
            <ul>
                <li><b>__get($property)</b> - Вызывается при обращении к неопределенному свойству</li>
                <li><b>__set($property,$value)</b> - Вызывается, когда неопределенному свойству присваивается значение</li>
                <li><b>__isset($property)</b> - Вызывается, когда функция isset() вызывается для неопределенного свойства</li>
                <li><b>__unset($property)</b> - Вызывается, когда функция unset() вызывается для неопределенного свойства</li>
                <li><b>__call($method,$arg_array)</b> - Вызывается при обращении к неопределенному нестатическому методу</li>
                <li><b>__callStatic($method,$arg_array)</b> - Вызывается при обращении к неопределенному статическому методу</li>
            </ul>
            <p>
                <b>Исключение</b> - это специальный объект, который является экземпляром встроенного
                класса <b>Exception</b> (или производного от него класса). Объекты типа Exception
                предназначены для хранения информации об ошибках и выдачи сообщений о них.
                Конструктору класса <b>Exception</b> передаются два необязательных аргумента:
                строка сообщения и код ошибки. В этом классе существуют также некоторые полезные
                методы для анализа ошибочной ситуации (табл. 4.1).
            </p>
			<p>
				Reflection API - для анализа классов, методов, обьектов
			</p>
            <p>
                PHP 5.5 опретор finally<br />
                РНР 5.3 Анонимные функции, раньше была функция, которая принимала 2 параметра имя функции и тело функции<br />
                PHP 5.3 Пространства имен<br />
				РНР 5.3 Впервые введена концепция позднего статического связывания<br />
				PHP 5.4 Трейты
				РНР 5.5 Введена конструкция ИмяКласса :: class<br />
				PHP 7.0 Строгая типизация скалярных типов
            </p>
			<p>
				<b>Полиморфизм</b> - это поддержка нескольких реализаций на основе общего интерфейса.
				И хотя это звучит непривычно, на самом деле вы с этим понятием уже знакомы.
				О необходимости полиморфизма обычно говорит наличие в коде большого
				количества условных операторов.
			</p>
			<p>
				<b>Инкопсуляцuя</b> (encapsulation) - это просто сокрытие данных и функциональности
				от клиентского кода. И опять-таки, это ключевое понятие объектно-ориентированного
				программирования.
			</p>
        </div>
    </body>
</html>



<?php
class ShopProduct {
    protected $title = "Стандартный товар";
    protected $producerMaintName = "Фамилия автора";
    protected $producerFirstName = "Имя автора";
    protected $prise = 0;

    //создаем конструктор (для страрых версий PHP ShopProduct() вместо __construct)
    function __construct( $title, $producerMaintName,$producerFirstName, $prise)
    {
        $this -> title             = $title;
        $this -> producerFirstName = $producerFirstName;
        $this -> producerMaintName = $producerMaintName;
        $this -> price             = $prise;
    }
    
    function getProducer() {
        return "{$this -> producerMaintName} ".
               "{$this -> producerFirstName}";
    }
    
    public function getSummaryLine() {
        $base  = " {$this->title} ( {$this -> producerMaintName}, " ;
        $base .= " {$this->producerFirstName} )";
        return $base;
    }
}    
$product1 = new ShopProduct('Книга','Иванов','Иван',10);
//print $product1 -> getProducer();


//наследование CDProduct - дочка
class CDProduct extends ShopProduct {
    private $playLenth;
    
    function __construct( $title, $producerMaintName,$producerFirstName, $prise, $playLenth){
        //Получаем у родителя
        parent::__construct($title, $producerMaintName,$producerFirstName, $prise);
        $this->playLenth = $playLenth;
    }
    
    public function getSummaryLine() {
        $base = parent::getSummaryLine();
        $base .= $this -> playLenth;
        return $base;
    }    
}
$product2 = new CDProduct('СD','Филимонов','Филимон',10, '20 минут');
//print $product2 -> getSummaryLine();


//Статические методы
class Example{
    static public $aNum = 0;
    static public function sayHello(){
        self::$aNum++;
        print "Привет (". self::$aNum . ")\n";
    }
}
$exampleStatic = new Example();
/*for($i=0;$i<=3;$i++){
    Example::$aNum ++;
    $exampleStatic->sayHello();
    Example::sayHello();
}*/


//Абстрактные классы
abstract class ShopProductWriter{
    protected $products = array();
    
    public function addProduct( ShopProduct $shopProduct ){
        $this->products[]=$shopProduct;
    }
    
    abstract public function write();
}
class ErroredWriter extends ShopProductWriter{
    //если не реализовывать этот метод будет ошибка
    public function write(){

    }
}


//Интерфейсы
interface Chargeable{
    public function getPrice($test);
}
interface ChargeableTwo{
    public function getPriceTwo();
}

class TestInterfase implements Chargeable,ChargeableTwo{
    const key_word = 'Ключевое слово, не может быть изменено';
    public function getPrice($test){echo $test . self :: key_word;}
    public function getPriceTwo(){  echo 2;}
}
$testInterfase = new TestInterfase();
//$testInterfase -> getPrice('Test');

function testInterfase(Chargeable $interfaseOne){
    print $interfaseOne -> getPrice('Функция testInterfase: <br/>');
}
//testInterfase($testInterfase);
//Проверка работы const
//echo TestInterfase::key_word;


//Трейты
//Проблемы , которые можно решить с помощью трейтов
class ShopProductPr{
    private $taxrate = 17;
    function calculateTax($variable){
        return ( ( $this -> taxrate/100) * $variable);
    }
}
$p = new ShopProductPr();
//print $p -> calculateTax(100)."\n";

//Разумеется , доступ к методу calculateTax() будет у всех подклассов данного
//класса. Но что нам делать, если речь заходит о совершенно другой иерархии классов?
//Представьте себе класс U t i l i t y S e r v i c e , который унаследован от другого класса
//S e rv i c e . И если для класса U t i l i t yS e rv i c e понадобится определить величину налога 
//по точно такой же формуле, то нам ничего не остается другого, как просто целиком
//скопировать тело метода c a l c u l a t eT a x ( ) , как показано ниже.

abstract class Servise {
    //Базовый класс для службы сервиса
}
class UtilityService extends Servise {
    private $taxrate = 17;
    public function calculateTax($variable){        
        return (($this->taxrate/100)*$variable);
    }
}
$u = new UtilityService();
//print $u -> calculateTax(100)."<br />";


//-----------| Использование трейтов+интерфейсов |---------------------//
interface IdentityObject{
    public function generateId();
}
trait PriceUtilities{
    private $taxrate = 17;
    public function calculateTax($variable){
        return (($this->taxrate/100)*$variable);
    }
}
trait IdentityTrait{
    public function generateID(){
        return uniqid();
    }
}
class ShopProductTwo implements IdentityObject{
    use PriceUtilities,IdentityTrait;
}
//----------------------------------------------------------------------//


//------| Устранение конфликтов имен с помощью ключевого слова insteadof |--------//
//Конфликт имён: 
trait TaxToolsOne {
    function calculateTax( $variable ){
        return 111;
    }
}
trait TaxToolsTwo {
    function calculateTax( $variable ){
        return 222;
    }
}
trait PriceUtilitiesTwo {
    private $taxrate = 17;
    public function calculateTax($variable){
        return (($this->taxrate/100)*$variable);
    }
}
abstract class Service {
    //Базовый класс для службы сервиса
}
class UtilityServiceTwo extends Service{
    use TaxToolsOne,
        TaxToolsTwo,
        PriceUtilitiesTwo { 
            //PriceUtilitiesTwo calculateTax() - в приоритете
            PriceUtilitiesTwo::calculateTax insteadof TaxToolsOne,TaxToolsTwo;
            //Даем новое имя методу
            TaxToolsTwo::calculateTax as renameTax; 
            //Определяем уровень доступа
            TaxToolsOne::calculateTax as private;           
        }
}
$u = new UtilityServiceTwo();
//print $u -> calculateTax(100); //метод тайтла PriceUtilitiesTwo
//print $u -> renameTax(100);    //переименованый метод тайтла TaxToolsTwo calculateTax()
//--------------------------------------------------------------------------------------------//



//---------------------------| Определение абстрактных методов в трейте |---------------------//
trait PriceUtilitiesTree {
    private static $taxrate = 17;
    static function calculateTax($variable){
        return ((self::$texrate)*$variable);
    }
    abstract function getTaxRate(); 
    //Это вынудитв базовом классе определять getTaxRate
}
//---------------------------------------------------------------------------------------------//


//----------------| Позднее статическое связывание: ключевое слово Static |--------------------//
// РНР 5.3 впервые введена концепция позднего статического связывания ( late static
// biлdings) . Самым заметным ее проявлением является введение нового (в данном
// контексте) ключевого слова static .
abstract class DomainObject {
}
class User extends DomainObject{
    public static function create(){
        return new User();
    }
}
class Document extends DomainObject{
    public static function create(){
        return new Document();
    }
} //Идет дуюлирование кода

abstract class DomainObjectV2 {
    public static function create(){
        return new static();
    }
}
class UserV2 extends DomainObjectV2{}
class DocumentV2 extends DomainObjectV2{
    public function __construct() {
        //echo '<p>Только что был создан экземпляр класса DocumentV2</p>';
    }
}
DocumentV2::create();
//Оно аналогично ключевому слову self, за исключением
//того, что относится к вызывающему, а не содержащему классу. В данном].'/]>>>>>>>>>>>>>>>>>>
//случае это означает, что в результате вызова метода Document :: create() возвращается
//новый объект типа Document
//---------------------------------------------------------------------------------------------//


//---------------------| Работа __call() |-----------------------------------------------------//
//Пример делегирования с помощью метода перехватчика
//Делегирование - это механизм посредством которого один объект может вызвать метод другого объекта.
class PersonWriter{
    function writeName(Person $p){
        print $p->getName()."\n";
    }
    function writeAge(Person $p){
        print $p->getAge()."\n";
    }
}
class Person {
    private $writer; //Тут мы сохраняем экземпляр PersonWriter
    function __construct(PersonWriter $writer){
        $this -> writer = $writer;
    }
    function __call($methodname, $args){
        //bool method_exists ( mixed $object , string $method_name )
        //Проверяет, существует ли метод класса, в указанном объекте object.
        if(method_exists( $this -> writer, $methodname)){
            return $this->writer->$methodname($this);
        }
    }
    function getName(){return "Иван";}
    function getAge(){return 44; }
}
$person = new Person( new PersonWriter());
//echo $person -> writeName();
//---------------------------------------------------------------------------------------------//


//--------------------| Работа с __get() и __set() |-------------------------------------------//
class Adress{
    private $number;
    private $street;
    
    function __construct($maybenurnber , $maybestreet = null){
        if ( is_null( $maybestreet)){            
            $this->streetaddress = $maybenurnber;
        } else {
           $this->number = $maybenurnber;
           $this->street = $maybestreet;
        }
    }
    function __set( $property, $value){
        if($property === 'streetaddress'){
            if (preg_match("/^(\d+.*?)[\s,]+(.+)$/",$value,$matches)){
                
                $this->number = $matches[1]; 
                $this->street = $matches[2];
            } else {
                //echo 'Исключение<br />';
                throw new Exception("Ошибка в адресе: '{$value}'");
            }            
        }
    }
    function __get($property){ 
        return $this->number." ".$this->street;
    }
}
$address = new Adress("441b Bakers Street");
//print "Адрес: {$address->streetaddress} <br/>";

//Выдает ошибку: Ошибка в адресе: и т.д.
//$address->streetaddress = "34West24thAvenue";

$address->streetaddress = "34, West 24th Avenue";
//print "Адрес: {$address->streetaddress} <br/>";

$address = new Adress( 15 , "Albert News" );
//print "Адрес: {$address->streetaddress} <br/>";
//---------------------------------------------------------------------------------------------//



//------------| Копирование объектов с помощьюn метода __clone() |-----------------------------//
class CopyMe{}
$first = new CopyMe();
$second = $first ;
// В РНР 4 переменные $second и $first ссЬLЛаются на два разных объекта
// Начиная с РНР 5 переменные $ second и $first ссЬLЛаются на один объект

$first = new CopyMe();
$second = clone $first;
// В РНР5 и более поздних версиях переменные $second и $first
// ссылаются н а два разных объекта

//например в нашем классе есть ID
class Account{
    public $balance;
    
    function __construct($balance){
        $this -> balance = $balance;
    }
}

class PersonTwo {
    private $name;
    private $age;
    private $id;
    public $account;
    
    function __construct($name, $age, Account $account){
        $this->name     = $name;
        $this->age      = $age;
        $this->account  = $account;
    }  
    
    function setId($id){        
        $this->id = $id;        
    }
    
    function __clone(){
        //обнуляем ID
        $this->id = 0;
        //если клонировать обект без кода ниже, то у 2х клонированных
        //экземпляров будет одинаковая ссылка на Account, и если изменять баланс, то он будет 
        //меняться у обоих
        $this->account = clone $this->account;
    }
}
//---------------------------------------------------------------------------------------------//



//-----------------------| Определение строковых значений для обьектов |-----------------------//
//Реализовав метод  __toString(), вы можете контролировать то, какую информацию
//будут выводить объекты при печати. Метод __toString() должен возвращать
//строковое значение. Этот метод вызывается автоматически. когда объект передается
//функции print или echo, а возвращаемое им строковое значение будет выведено
//на экран.
class PersonThree{
    function getName() { return "Иван";}
    function getAge()  { return 44;}
    
    function __toString(){
        $log = $this->getName();
        $log.= " возраст {$this->getAge()} лет<br />";
        return $log;
    }    
}
$person = new PersonThree();
//echo $person;

//Применение
//Метод __toString() особенно полезен для записи информации в журнальные
//файлы и для выдачи сообщений об ошибках, а также для классов, основная задача
//которых - передавать информацию.
//---------------------------------------------------------------------------------------------//



//----------------------------| Callback функции |---------------------------------------------//
//Callback (англ. call — вызов, англ. back — обратный) или фу́нкция обра́тного вы́зова в программировании — 
//передача исполняемого кода в качестве одного из параметров другого кода. Обратный вызов позволяет в функции 
//исполнять код, который задаётся в аргументах при её вызове.

//Достоинства и недостатки

//Достоинства:
//Возможность динамического изменения функциональности (подключения и отключения плагинов/модулей при работе программы).
//Возможность неограниченного количества вариантов вызываемой функции без изменения базового (в данном контексте) кода.
//Возможность вставки вызываемой функции не только для альтернативного поведения, но и в качестве ещё одной (промежуточной) подпрограммы — обычно для отслеживания операций или изменения параметров для следующей (вызываемой) функции. Таких независимых «дополнительных звеньев» в цепочке вызовов может быть сколько угодно.
//Поддержка функций обратного вызова в большинстве современных языков программирования общего назначения.

//Недостатки:
//Уменьшение производительности, связанной с дополнительными вызовами «обратной функции» — прямо пропорционально «стоимости вызова функции» в среде выполнения и количеству дополнительных вызовов при работе программы.
//Ухудшение читаемости исходного кода — для понимания алгоритма программы необходимо отслеживать всю цепочку вызовов.

class ProductFore{
    public $name;
    public $price;
    
    function __construct($name,$price){
        $this->name  = $name;
        $this->price = $price;
    }
}
class ProcessSale{
    private $callbacks;
    
    function registerCallback($callback){
        //Функция is_callable — Функция определяет, может ли содержимое переменной быть вызвано как функция.
        if(!is_callable($callback)){
            throw new Exception('Функция обратного вызова - невызываемая');             
        }
        $this -> callbacks[]  = $callback;
    }    
    function sale($product){
        print "{$product->name}: обрабатывается...<br />";
        foreach ($this->callbacks as $callback){
            //Вызывает пользовательскую функцию, указанную в первом параметре
            call_user_func($callback, $product);
        }
    }
}
//------------------------------------------------------------------------------------------------------------//



//----------------------------------------| Пакеты и пространства имен |--------------------------------------//
//Пакет - это набор связанных классов, обычно сгруппированных вместе некоторым
//способом. Пакеты можно использовать для разделения частей системы на
//логические компоненты. По сути, в РНР концепция пакетов не поддерживалась.

//Суть заключался в том, что перед именем класса нужно было указать имя
//пакета, чтобы в результате получились уникальные имена классов.

//Пример 1 старый пакетный метод
//useful /Outputter2.php
class useful_Outputter {
    //
}
// my.php
//require_once "useful/Outputter2.php " ;
class my_Outputter {
    //
}

//Пример 2 пространства имён
//namespace MyProject\MadaZastra; ставится в начале скрипта + кодировка должна быть UTF8 без BOM
//Уровень вложености namespace MyProject\ProjectOne;
class Debug {
static function helloWorld(){
    //print "Привет из класса Debug ! \n " ;
    }
}
//Используем путь от корня
\MyProject\MadaZastra\Debug :: helloWorld();

//Если из нового пространства имен мне нужен только класс Debug.
//я моrу импортировать только его. а не все пространство, как показано ниже.
//+мы его переименовали
namespace main;

use \MyProject\MadaZastra\Debug as uDebug;

//echo 'Сейчас мы находися в пространстве имён '.__NAMESPACE__;
//------------------------------------------------------------------------------------------------------------//


//------------------------------| Еще один способ избежать конфликта имён |-----------------------------------//
//Он заключается в использовании общего соглашения об именовании, принятого для пакетов PEAR
//PEAR расшифровывается как РНР Extension and App/ication Repository (хранилище расширений
// и приложений РНР). Это официально поддерживаемый архив пакетов и средств, которые расширяют
// функциональные возможности РНР.

//В PEAR для определения пакетов используется файловая система, как уже бьmо
//описано выше. Затем каждый класс получает имя в соответствии со своим путем.
//причем имена каталогов отделяются символом подчеркивания.
//------------------------------------------------------------------------------------------------------------//



//---------------------------| Получение информации об обьекте или классе |-----------------------------------//
$person = new \MyProject\MadaZastra\my_Outputter();
if($person instanceof \MyProject\MadaZastra\my_Outputter){
    //echo 'Экземпляр $person принадлежит классу my_Outputter из другого пространства имён<br />';
}

if( get_class($person) == 'MyProject\MadaZastra\my_Outputter'){
    //echo 'Экземпляр $person принадлежит классу my_Outputter из другого пространства имён<br />';
}

//в РНР 5 . 5 введена конструкция ИмяКласса :: class.
//Другими словами , к существующему имени класса в ы можете добавить оператор
//определения зоны видимости и с помощью ключевого слова c l a s s найти полностью
//определенное имя этого класса, как показано в приведенных ниже примерах.
//echo uDebug::class;
//-----------------------------------------------------------------------------------------------------------//


//-----------------------------------| Методы __call и __get |-----------------------------------------------//
//Неявное наследование:
class a {
    function eh($eg,$eg2){
        echo $eg.$eg2.'<br>';
    }
    public $pop = 1;
}

$a = new a;
$a->pop = 2;

class b{       
    public $clone;
    function __get($property){
        return $this->clone->$property;
    }
    
    function __call($property,$var){  
        return call_user_func_array(array($this->clone, $property), $var);       
    }
    
    function __construct(&$a){
        $this->clone = $a;
    }
}

$b = new b($a);
//$b->eh('Тест','1'); //Выведет Тест1
//echo $b->pop;		//Выведет 2
//-----------------------------------------------------------------------------------------------------------//





