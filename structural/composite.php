<?php 
//Composite : Composite: создание структур. в которых группы объектов можно использовать
//так, как будто это отдельные объекты.

//это простой способ объединения, а затем и управления
//группами схожих объектов. В результате отдельный объект для клиентского кода
//становится неотличимым от коллекции объектов. В сущности, этот шаблон очень
//прост, тем не менее он может сбить с толку. Одна из причин этого - сходство структуры
//классов в шаблоне с организацией его объектов. Иерархии наследования представляют
//собой деревья, корнем которых является суперкласс, а ветвями - специализированные
//подклассы. Дерево наследования классов, созданных с помощью
//шаблона Composite, предназначено для того. чтобы разрешить просrую генерацию
//объектов и их обход по дереву.

//Проблема
namespace problem{

abstract class Unit{ //еденица, часть
	abstract function bombardStrength(); //атакующая сила
}

class Archer extends Unit{ //лучник
	function bombardStrength(){
		return 4;
	}
}
class LaserCannonUnit extends Unit{ //лучник
	function bombardStrength(){
		return 44;
	}
}

//класс для групировки юнитов
class Army{
	private $units = array();
	
	function addUnit(Unit $unit){
		array_push($this->units,$unit) ;
	}
	
	function bombardStrength(){
		$ret = 0;
		foreach($this->units as $unit){
			$ret += $unit->bombardStrength();
		}
		return $ret;
	}
}

//Усложним задачу:
//Предположим, армия должна быть способна объединяться с другими армиями. 
//При этом каждая армия должна сохранять свою индивидуальность, 
//чтобы впоследствии она могла выйти из более крупного соединения.

//Мы можем изменить класс Arrny так, чтобы в нем можно было оперировать как
//объектами типа Arrny. так и объектами типа Unit .
/*
function addArrny (Arrny $army) {
	array_push ($this -> armies, $army ) ;
}
Нам нужно изменить метод bombardStrength(), чтобы делать итерации по всем
армиям и объектам типа Unit.

function bombardStrength( ) {
	$ret = О ;
	foreach($this -> units as $unit){
		$ret += $unit- >bombardStrength() ;
	}
	foreach ($this -> armies as $army){
		$ret += $army -> bombardStrength() ;
	}
	return $ret;
}
*/
}

namespace realize{
	abstract class Unit {
		abstract function    addUnit(Unit $unit);
		abstract function removeUnit(Unit $unit);
		abstract function bombardStrength();		
	}
	
	class Army extends Unit{
		private $units = array();
		function addUnit(Unit $unit){
			if( in_array( $unit, $this->units, true)) {
				return; //Юнит уже в армии, добавлять не нужно
			}
			$this -> units[] = $unit;
		}
		function removeUnit(Unit $unit){
			//array_udiff — Вычисляет расхождение массивов, используя для сравнения callback-функцию
			$this -> units = array_udiff( $this->units, 
										  array($unit),
										  function($a,$b){
											return ($a===$b)?0:1;
										  }
										 );
		}
		function bombardStrength(){
			$ret = 0;
			foreach($this->units as $unit){
				$ret += $unit->bombardStrength();
			}
			return $ret;
		}
	}
	
	//Существует проблематичный аспект шаблона Composite
	//Реалтзация функций добавления и удаления, 
	//которые помещены в абстрактный суперкласс
	//Это гарантирует что во всех классах шаблона используется общий интерфейс
	//Также это означает, что во всех классах листьях нужно обеспечить их реализацию
	
	class UnitExeption extends \Exception{}
	
	class Archer extends Unit{ //лучник
		function addUnit(Unit $unit){
			throw new UnitExeption( get_class($this) . " относится к 'листьям'" );
		}
		
		function removeUnit(Unit $unit){
			throw new UnitExeption( get_class($this) . " относится к 'листьям'" );
		}
		
		function bombardStrength(){
			return 4;
		}
	}
	
	class LaserCannonUnit extends Unit{ //лучник
		function addUnit(Unit $unit){
			throw new UnitExeption( get_class($this) . " относится к 'листьям'" );
		}
		
		function removeUnit(Unit $unit){
			throw new UnitExeption( get_class($this) . " относится к 'листьям'" );
		}
		function bombardStrength(){
			return 44;
		}
	}
	//Чтобы не писать каждый раз реализацию addUnit/removeUnit в листьях 
	//можно реализовть их в классе UNIT Такой подход позволяет избавиться от дублирования кода в классах-"листьях".
	//Однако у него имеется серьезный недостаток - шаблон Composite во время компиляции
	//не обязан обеспечивать реализацию методов addUnit() и removeUnit(). что в
	//конечном итоге может стать причиной проблем.
	
	//Во многих случаях реально увидеть преимушества шаблона можно только с точки
	//зрения клиентского кода, поэтому давайте создадим пару армий.
	
	//создаём армию
	$main_army = new Army();
	//Добавляем пару боевых едениц
	$main_army->addUnit( new Archer() );
	$main_army->addUnit( new LaserCannonUnit() );
	//Создадим еще одну армию
	$sub_army = new Army();
	// Добавим несколько боевых единиц
	$sub_army->addUnit ( new Archer ( ) ) ;
	$sub_army->addUnit ( new Archer ( ) ) ;
	$sub_army->addUnit ( new Archer ( ) ) ;
	//Добавляем вторую армию к первой
	$main_army->addUnit ( $sub_army );
	//Все вычисления выполняются за кулисами
	print "Атакующая сила: {$main_army->bombardStrength()}\n"; //4+44 + 4*3 = 60
	
	//Проверка работы исключений
	//Выведет FatalError
	//$single_archer = new Archer();
	//$single_archer -> addUnit($sub_army);

}

//Выводы:

//Гибкость - 	Поскольку во всех элементах шаблона Composite используется общий
//				супертип, очень просто добавлять к проекту новые объекты-композиты
//				или "листья", не меняя более широкий контекст программы.

//Простота -	Клиентский код. использующий структуру Composite. имеет простой
//				интерфейс. Клиентскому коду не нужно делать различие между объектом.
//				состоящим из других объектов. и объектом-"листом" (за исключением случая
//				добавления новых компонентов). Вызов метода Army : : bomЬa rdSt rength ( ) может
//				стать причиной серии делегированных внутренних вызовов, но для клиентского
//				кода процесс и результат в точности эквивалентны тому, что связано
//				с вызовом Archer::bomЬardStrength() .

//Неявная досягаемость - 	В шаблоне Composite объекты организованы в древовидную
//							структуру. В каждом композите содержатся ссылки на дочерний объект.
//							Поэтому операция над определенной частью дерева может иметь более
//							широкий эффект. Мы можем удалить один объект Army из его родительского
//							объекта Army и добавить к другому. Это простое действие осуществляется над
//							одним объектом. но в результате изменяется статус объектов Unit, на которые
//							ссылается объект Army, а также статус их дочерних объектов.

//Явная досягаемость -  В древовидной структуре можно легко выполнить обход
//						всех ее узлов. Для получения информации нужно последовательно перебрать
//						все ее узлы либо выполнить преобразования.





//Избавляемся от проблем addUnit/removeUnit в листьях или или отсутствия оных в Unit

namespace without{
	use problem\Archer as Archer; 
	use problem\LaserCannonUnit as LaserCannonUnit;
	
	//Мы можем легко разбить классы-композиты на подтипы CompositeUnit. Прежде
	//всего, мы исключим функции добавления/удаления боевых единиц из класса Unit.
	abstract class Unit{
		function getComposite(){
			return NULL;
		}
		abstract function bombardStrength();		
	}
	
	//класс CompositeUnit обьявлен абстракным т.к. он не реализует bombardStrength()
	abstract class CompositeUnit extends Unit{
		private $units = array();
		function getComposite(){
			return $this;
		}
		protected function units(){
			return $this->units;
		}
		function addUnit(Unit $unit){
			if( in_array( $unit, $this->units,true) ){
				return;
			}
			$this->units[] = $unit;
		}
	}
	
	//Теперь у нас нет бесполезной реализации методов добавления/удаления боевых
	//единиц в классах-"листьях", но в клиентском коде перед вызовом метода add
	//Unit() нужно по-прежнему проверить тип объекта (унаследован ли он от класса
	//CompositeUnit).
	//
	//Вот тут-то и вступает в свои права метод getComposite() . По умолчанию этот
	//метод возвращает нулевое значение. Только в классе CompositeUnit он возвращает
	//ссылку на объект типа CompositeUnit. Поэтому если вызов этого метода возвращает
	//объект, то мы должны иметь возможность вызвать для него метод addUnit( ) . Вот
	//как это можно использовать в клиентском коде.
	
	class UnitScript{
		private $comp;
		static function joinExisting(Unit $newUnit, 
									 Unit $occupyingUnit){
			if(!in_null($comp = $occupyingUnit->getComposite() ) ){						 
				$comp -> addUnit( $newUnit );
			} else {
				$comp = new Army();
				$comp->addUnit( $occupyingUnit );
				$comp->addUnit( $newUnit );
			}
		}
	}
	//Методу joinExisting() передаются два объекта типа Unit. Первый- это объект,
	//вновь прибывший на 1U1етку, а второй - объект. который занимал клетку до этого.
	//Если второй объект типа Unit принадлежит к клaccy CompositeUnit, то первый
	//объект попытается присоединиться к нему. Если нет, то будет создан новый объект
	//типа Аrmу, включающий оба объекта типа Unit.
	
	//Минусы
	//Простота достигается за счет гарантии того, что все классы происходят из общего базового клacca. Но
	//за простоту иногда приходится платить безопасностью использования типа. Чем
	//сложнее становится модель, тем больше вероятность, что вам придется вручную
	//делать проверку типов.
	//Например запретить сажать лошадь в бронетранспортёр
}