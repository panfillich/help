<?php 
//Назначение - для обработки команды, действия в виде объекта
//Объект команды заключает в себе само действие и его параметры.

 
//У нас есть класс, над которым необходимо провести действие
class Lamp
{
	public function turnOn()
	{
		echo "I'm bright and cheerful light.\n";
	}
	public function turnOff()
	{
		echo "I am quiet and peaceful shadow\n";
	}
}
 
 
// И так понятно что это))))
interface CommandInterface {
	//Выполнение команды
    public function execute();
}

//Вкл. лампу
class TurnOnCommand implements CommandInterface {
    protected $lamp;
    public function __construct(Lamp $lamp) {
        $this->lamp = $lamp;
    }
    public function execute() {
        $this->lamp->turnOn();
    }
}

//Выкл. лампу
class TurnOffCommand implements CommandInterface {
    protected $lamp;
    public function __construct(Lamp $lamp) {
        $this->lamp = $lamp;
    }
    public function execute() {
        $this->lamp->turnOff();
    }
}

//В данном случае команды выступают в роли тонких делегатов, 
//передавая право выполнять команду объекту класса Lamp

//Использование
$lamp = new Lamp();
$on = new TurnOnCommand($lamp);
$on->execute();











