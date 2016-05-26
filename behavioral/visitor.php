<?php
	
	//Посетитель (англ. visitor) — поведенческий шаблон проектирования, 
	//описывающий операцию, которая выполняется над объектами других классов. 
	//При изменении visitor нет необходимости изменять обслуживаемые классы.
	//Шаблон демонстрирует классический приём восстановления информации о потерянных типах, 
	//не прибегая к понижающему приведению типов.
	
	
	//Применяется в случаях: 	
	//
	//когда необходимо для ряда классов сделать похожую (одну и ту же) операцию.

	//Плюсы: 	
	//
    //новая функциональность в несколько классов добавляется сразу, не изменяя код этих классов;
    //позволяет получить информацию о типе объекта;
    //двойная диспетчеризация;
    //возможность описания своего алгоритма для каждого типа объектов.

	//Минусы: 	
	//
    //при изменении обслуживаемого класса нужно поменять код у шаблона;
    //затруднено добавление новых классов, поскольку нужно обновлять иерархию посетителя и его сыновей.

	
	//Добавьте метод accept(Visitor) в иерархию «элемент».
    //Создайте базовый класс Visitor и определите методы visit() для каждого типа элемента.
    //Создайте производные классы Visitor для каждой операции, исполняемой над элементами.
    ///Клиент создаёт объект Visitor и передаёт его в вызываемый метод accept().

	
	interface Visitor {
		public function visit ( Point $point );
	}

	abstract class Point {
		//accept - принять
		public abstract function accept ( Visitor $visitor );
		private $_metric = -1;
		public function getMetric () {
			return $this->_metric;
		}
		public function setMetric ( $metric ) {
			$this->_metric = $metric;
		}
	}

	class Point2d extends Point {

		public function __construct ( $x, $y ) {
			$this->_x = $x;
			$this->_y = $y;
		}

		public function accept ( Visitor $visitor ) {
			$visitor->visit( $this );
		}

		private $_x;
		public function getX () { return $this->_x; }

		private $_y;
		public function getY () { return $this->_y; }
	}

	class Point3d extends Point {
		public function __construct ( $x, $y, $z ) {
			$this->_x = $x;
			$this->_y = $y;
			$this->_z = $z;
		}

		public function accept ( Visitor $visitor ) {
			$visitor->visit( $this );
		}

		private $_x;
		public function getX () { return $this->_x; }

		private $_y;
		public function getY () { return $this->_y; }

		private $_z;
		public function getZ () { return $this->_z; }
	}

	class Euclid implements Visitor {
		public function visit ( Point $p ) {
			if($p instanceof Point2d)
				$p->setMetric( sqrt( $p->getX()*$p->getX() + $p->getY()*$p->getY() ) );
			elseif( $p instanceof Point3d)
				$p->setMetric( sqrt( $p->getX()*$p->getX() + $p->getY()*$p->getY() + $p->getZ()*$p->getZ() ) );
		}
	}

	class Chebyshev implements Visitor {
		public function visit ( Point $p ) {
			if($p instanceof Point2d){
				$ax = abs( $p->getX() );
				$ay = abs( $p->getY() );
				$p->setMetric( $ax>$ay ? $ax : $ay );
			}
			elseif( $p instanceof Point3d){
				$ax = abs( $p->getX() );
				$ay = abs( $p->getY() );
				$az = abs( $p->getZ() );
				$max = $ax>$ay ? $ax : $ay;
				if ( $max<$az ) $max = $az;
				$p->setMetric( $max );
			}
		}
	}


	$p = new Point2d( 1, 2 );
	$v = new Chebyshev();
	$p->accept( $v );
	echo ( $p->getMetric() );
