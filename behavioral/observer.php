<?php 
//«Наблюдатель» – это шаблон, предусматривающий для наблюдаемого объекта возможность зарегистрировать наблюдателя, 
//когда тот вызовет специальный метод.
//Далее, если состояние наблюдаемого объекта меняется, он посылает сообщение об этом своим наблюдателям:


//Наблюдаемый
interface Observable{
	//Добавить наблюдателя
	function addObserver(Observer $observer);
}

//Наблюдатель
interface Observer{
	//Ф-я срабатывающая при изменении наблюдаемого
	function onChange(Observable $observable, $arg);
}

class SomeObservable implements Observable{
	//Наблюдатель
	private $observer;

	//Добавить наблюдателя
	function addObserver(Observer $observer){
		$this -> observer = $observer;
	}
	
	//Какой-нибудь отслеживаемый метод
	function someMethod($str){
		$this -> observer -> onChange($this, $str);
	}
}

class SomeObserver implements Observer{
	//Ф-я срабатывающая при изменении наблюдаемого
	function onChange(Observable $observable, $arg){
		echo 'Зафиксировано событие. Аргументы: ' . $arg . '<br />';
	}
}

$someObservable = new SomeObservable();
$someObservable->addObserver(new SomeObserver());
$someObservable->someMethod('Тестовая строка');
