<?php
//Decorator (Декоратор) относиться к классу структурных паттернов. 
//Он используется для динамического расширения функциональности объекта. 
//Является гибкой альтернативой наследованию.

//Сущность работы паттерна декоратор заключается в "оборачивании" готового объекта новым функционалом, 
//при этом весь оригинальный интерфейс объекта остается доступным (декоратор переадресует все запросы объекту). 
//Смысл заключается в том, чтобы можно было безболезненно комбинировать различные декораторы в произвольном порядке, 
//навешивая их на различные объекты. В некотором роде, это похоже на технологию traits, за исключением того, 
//что декораторы динамически навешиваются на объект, а traits статически на класс.
//В некоторых случаях, вместо переопределения всех методов используется магический метод __call

abstract class Component
{
    abstract public function Operation();
}
class ConcreteComponent extends Component
{
    public function Operation()
    {
        return 'I am component';
    }
}
abstract class Decorator extends Component
{
    protected
        $_component = null;
    public function __construct(Component $component)
    {
        $this -> _component = $component;
    }
    protected function getComponent()
    {
        return $this -> _component;
    }
    public function Operation()
    {
        return $this -> getComponent() -> Operation();
    }
}
class ConcreteDecoratorA extends Decorator
{
    public function Operation()
    {
        return '<a>' . parent::Operation() . '</a>';
    }
}
class ConcreteDecoratorB extends Decorator
{
    public function Operation()
    {
        return '<strong>' . parent::Operation() . '</strong>';
    }
}
// Example
$Element = new ConcreteComponent();
$ExtendedElement = new ConcreteDecoratorA($Element);
$SuperExtendedElement = new ConcreteDecoratorB($ExtendedElement);
print $SuperExtendedElement -> Operation(); //<strong><a>I am component</a></strong>



//Более красивая реализация
class DecoratorTwo
{
    protected $class;
 
    public function __construct($class)
    {
        $this->class = $class;
    }
 
	//будет выполнен при чтении данных из недоступных свойств. 
    public function __get($name)
    {
        return $this->class->{$name};
    }

	//будет выполнен при записи данных в недоступные свойства.
    public function __set($name, $value)
    {
        $this->class->{$name} = $value;
    }
 
	//В контексте объекта при вызове недоступных методов вызывается метод __call(). 
    public function __call($method, $arguments = [])
    {
		//Вызывает пользовательскую функцию с массивом параметров
        return call_user_func_array([$this->class, $method], $arguments);
 
    }
	
    public function render()
    {
        return 'decorator ' . $this->class->render();
    }
 
    public function decoratorOnlyMethod()
    {
        return true;
    }
}

class Text{
	private $text = 'Text: ';
	
	public function __construct($text = 'text'){
		$this -> text .= $this -> text.$text;
	}
	
	public function drow($text){
		echo $this -> text. '<br />' .$text;
	}
}

$dec_two = new DecoratorTwo(new Text('Decorator forever'));
$dec_two->drow('everywhere');

