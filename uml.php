<?php //http://habrahabr.ru/post/150041/

//     ____________________________________________
//    |                                            |
//    |  1. Отношение обобщения — это наследование  |
//    |_______________________________________________|

//
//    Man     _______________________|\   Employee
//                                   |/

//Класс «Man»(человек) — более абстрактный, а «Employee»(сотрудник) 
//более специализированный. Класс «Employee» наследует свойства и методы «Man».

namespace uml\one {

    class Man
    {
        protected $name;
        protected $surname;

        public function getName()
        {
            return $this->name;
        }

        public function setName($newName)
        {
            $this->name = $newName;
        }

        public function getSurname()
        {
            return $this->surname;
        }

        public function setSurname($newSurame)
        {
            $this->surname = $newSurame;
        }
    }

    //наследуем класс Man
    class Employee extends Man
    {
        protected $position;

        //создаём конструктор
        function __construct($n, $s, $p)
        {
            $this->name = $n;
            $this->surname = $s;
            $this->position = $p;
        }

        function getPosition()
        {
            return $this->position;
        }

        function setPosition($newPosition)
        {
            $this->position = $newPosition;
        }
    }

    /** @var Employee $person_1 */
    $person_1 = new Employee('Иван', 'Иванов', 'Работник ЖКХ');
    $person_1->setSurname('Пистолетов');
    //echo "Фамилия : {$person_1->getSurname()} <br />";
    //echo "Имя     : {$person_1->getName()}    <br />";
    //echo "Работа  : {$person_1->getPosition()}<br />";
}


//
//    2. Ассоциация 
//       Ассоциация показывает отношения между объектами-экземплярами класса. 
//
//    2.2 Бинарная Ассоциация//
//    Employee    1 _______________________\ 1  IdCard 
//                                         /
namespace uml\two {

    use uml\one\Employee as EmployeeParant;

    //Расширяем класс Employee
    class Employee extends EmployeeParant
    {
        protected $iCard;

        function __construct($n, $s, $p)
        {
            parent::__construct($n, $s, $p);
        }

        function setIdCard(IdCard &$c)
        {
            $this->iCard = $c;
        }

        function getIdCard()
        {
            return $this->iCard;
        }
    }


    class IdCard
    {
        private $dateExpire;
        private $number;

        function __construct($n)
        {
            $this->number = $n;
        }

        function setNumber($newNumber)
        {
            $this->number = $newNumber;
        }

        function getNumber()
        {
            return $this->number;
        }

        function setDateExpire($newDateExpire)
        {
            $this->dateExpire = $newDateExpire;
        }

        function getDateExpire()
        {
            return $this->dateExpire;
        }
    }

    $IdCard = new IdCard(123);
    $IdCard->setDateExpire(mktime(0, 0, 0, 12, 30, 2015));
    $person_1 = new Employee('Иван', 'Иванов', 'ЖКХ');
    $person_1->setIdCard($IdCard);
    //echo $person_1->getName() . ' Работает в ' . $person_1->getPosition() . '<br />';
    //echo 'Удостовирение действует до ' . date('d.m.Y', $person_1->getIdCard()->getDateExpire()) . '<br>';

    //Класс Employee имеет поле card, у которого тип IdCard,
    //так же класс имеет методы для присваивания значения(setIdCard) этому полю и для
    //получения значения(getIdCard).
    //Из экземпляра объекта Employee мы можем узнать о связанном с ним объектом типа IdCard, значит
    //навигация (стрелочка на линии) направлена от Employee к IdCard.
}


//
//    2. Ассоциация 
//       Ассоциация показывает отношения между объектами-экземплярами класса. 
//
//    2.2 N-арная ассоциация
//    Employee    1 _______________________\ n  Room 
//                                         /


//Представим, что в организации положено закреплять за работниками помещения. Добавляем новый класс Room.
//Каждому объекты работник(Employee) может соответствовать несколько рабочих помещений. Мощность связи один-ко-многим.
//Навигация от Employee к Room.

namespace uml\tree {

    use uml\two\Employee as EmployeeParant;
    use uml\two\IdCard as IdCard;

    //Теперь попробуем отразить это в коде. Новый класс Room:
    class Room
    {
        private $number;

        function __construct($n)
        {
            $this->number = $n;
        }

        function setNumber($newNumber)
        {
            $this->number = $newNumber;
        }

        function getNumber()
        {
            return $this->number;
        }
    }

    //Добавим в класс Employee поле и методы для работы с Room:
    class Employee extends EmployeeParant
    {
        private $room = array();
		
		function __construct($n, $s, $p)
        {
            parent::__construct($n, $s, $p);
        }

        function setRoom(Room &$newRoom){
            $this->room[] = $newRoom;
        }
        function getRoom(){
            return $this->room;
        }
        function deleteRoom(Room &$r){
            $key = array_search($r,$this->room,true);
            if ($key!==FALSE){
                unset($this->room[$key]);
            } else {
                echo 'Не найдена команата <br />';
            }
        }
    }

    $IdCard = new IdCard(123);
    $IdCard->setDateExpire(mktime(0, 0, 0, 12, 30, 2015));
    $person_1 = new Employee('Иван', 'Иванов', 'ЖКХ');
    $person_1->setIdCard($IdCard);
    $room101 = new Room(101);
    $room273 = new Room(273);
    $room321 = new Room(321);
    $person_1->setRoom($room101);
    $person_1->setRoom($room273);
    $person_1->setRoom($room321);
    //echo $person_1->getName() . ' Работает в ' . $person_1->getPosition() . '<br />';
    //echo 'Удостовирение действует до ' . date('d.m.Y', $person_1->getIdCard()->getDateExpire()) . '<br>';
    //echo 'Имеет доступ к комнатам :';
    //foreach ($person_1->getRoom() as $room){
    //    echo $room->getNumber(). ' ';
    //}

}


//
//    2.3 Агрегация
//
//    Employee     _____________________/\   Department(отдел)
//                                      \/
namespace uml\fore{

    // Введем в модель класс Department(отдел) — наше предприятие структурировано по отделам.
    // В каждом отделе может работать один или более человек.
    // Можно сказать, что отдел включает в себя одного или более сотрудников и таким образом их агрегирует.
    // На предприятии могут быть сотрудники, которые не принадлежат ни одному отделу, например, директор предприятия.

    class Department{
        private $name;
        private $employees = array();
		
        function __construct($n){
            $this->name = $n;
        }

        function setName($newName){
            $this->name = $newName;
        }

        function getName(){
            return $this->name;
        }

        function addEmployee(Employee $newEmployee){
            $this->employees[] = $newEmployee;
            // связываем сотрудника с этим отделом
            $newEmployee->setDepartment($this);
        }

        function getEmployees(){
            return $this->employees;
        }

        function removeEmployee(Employee $e){
			$key = array_search($e,$this->employees,true);
            if ($key!==FALSE){
                unset($this->employees[$key]);
            } else {
                echo 'Сотрудник не найден в департаменте <br />';
            }
        }
    }

    // Итак, наш класс, помимо конструктора и метода изменения имени отдела,
    // имеет методы для занесения в отдел нового сотрудника, для удаления сотрудника
    // и для получения всех сотрудников входящих в данный отдел.
    // Навигация на диаграмме не показана, значит она является двунаправленной:
    // от объекта типа «Department» можно узнать о сотруднике
    // и от объекта типа «Employee» можно узнать к какому отделу он относится.

    // Так как нам нужно легко узнавать какому отделу относится какой-либо сотрудник,
    // то добавим в класс Employee поле и методы для назначения и получения отдела.
	
	use uml\tree\Employee as EmployeeParant;
	
	class Employee extends EmployeeParant{
		private $department;
		
		function __construct($n, $s, $p){
			parent::__construct($n, $s, $p);
		}
		function setDepartment(Department &$d){
			$this->department = $d;
		}
		function getDepartment(){
			return $this->department;
		}
	}
	
	//Использование
	$programmersDepartment = new Department("Программисты");
	$person_1 = new Employee('Иван', 'Иванов', 'ЖКХ');
	$programmersDepartment->addEmployee($person_1);	
	//echo $person_1->getName() . ' Работает в ' . $person_1->getPosition() . '<br />';
	//echo "Относится к отделу ".$person_1->getDepartment()->getName();
	
}


//
//    2.3.1 Композиция
//
//    pastPosition ___________//\\  Employee  ___________/\   Department(отдел) /___________ pastPosition
//					    	  \\//						 \/						\


// Предположим, что одним из требований к нашей системе является требование о том, 
// чтоб хранить данные о прежней занимаемой должности на предприятии.
// Введем новый класс «pastPosition». В него, помимо свойства «имя»(name), 
// введем и свойство «department», которое свяжет его с классом «Department».

//Данные о прошлых занимаемых должностях являются частью данных о сотруднике, 
//таким образом между ними связь целое-часть и в то же время,
//данные о прошлых должностях не могут существовать без объекта типа «Employee». 
//Уничтожение объекта «Employee» должно привести к уничтожению объектов «pastPosition».

namespace uml\five{

	/*class PastPosition{
		private $name = '';
		private $department;
		function __construct($position, Department &$dep){
			$this->name = $position;
			$this->department = $dep;
		}
		public void setName($newName){
			$this->name = newName;
		}
		public String getName(){
			return $this->name;
		}
		public void setDepartment(Department $d){
			$this->department = $d;
		} 
		public Department getDepartment(){
			return $this->department;
		}
	}
	
	//В класс Employee добавим свойства и методы для работы с данными о прошлой должности:
	use uml\fore\Employee as EmployeeParant;
	class Employee extends EmployeeParant{
		private $pastPosition = array();
		function __construct($n, $s, $p){
			parent::__construct($n, $s, $p);
		}
		function setPastPosition(PastPosition $p){
			$this->pastPosition[] = clone $p;
		}
		function getPastPosition(){
			 return $this->pastPosition;
		}
		function deletePastPosition(PastPosition $p){

		}
	}
	
	$person_1 = new Employee('Иван', 'Иванов', 'ЖКХ');
	// изменяем должность
	$person_1->setPosition("Сторож");
	// смотрим ранее занимаемые должности:
	System.out.println("В прошлом работал как:");
	Iterator iter = sysEngineer.getPastPosition().iterator();
	while(iter.hasNext()){
		System.out.println( ((PastPosition) iter.next()).getName());
	}*/
}

