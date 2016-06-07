<?php 
//� DataMapper �� ������� ��� ����������/�������� ��������� (� ��� ��� ������� � ����� ������) � ��������� �����. 
//��� ������ ������ ������: 

class Foo
{
    public $id;
    public $bar;
 
    public function do_something()
    {
        $this->bar .= uniqid();
    }
}
 
class FooMapper
{
    protected $db;
 
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function saveFoo(Foo &$foo)
    {
        if ($foo->id) {
            $sql = "UPDATE foo SET bar = :bar WHERE id = :id";
            $statement = $this->db->prepare($sql);
            $statement->bindParam("bar", $foo->bar);
            $statement->bindParam("id", $foo->id);
            $statement->execute();
        }
        else {
            $sql = "INSERT INTO foo (bar) VALUES (:bar)";
            $statement = $this->db->prepare($sql);
            $statement->bindParam("bar", $foo->bar);
            $statement->execute();
            $foo->id = $this->db->lastInsertId();
        }
    }
}
 
//Insert
$foo = new Foo();
$foo->bar = 'baz';
$mapper = new FooMapper($db);
$mapper->saveFoo($foo);


/*� ������ ������, ����� Foo ������� ����� � ������ ������������ ������ � ����� ������-������. �� �� ������ �� ������ ��������� ����������� ������, �� ���� �� ����� � �� ��������� � ���, ��� �� ��� ������ ���� ���������.

������������ Data Mapper-�

    ������ ������ ����� ���� ���� ���������������, ��� ����� ������ ��������� SOLID � �������� ������ ������ ������� � �� ��������.
    ������-������ � ���������� ������ ������� �����, � ���� �� ������ ��������� ������ � XML-���� ��� �����-������ ������ ������, �� ������ ������ �������� ����� Mapper, �� ������������� � ��������� �������.


���������� Data Mapper-�

    ��� �������� ������� ������ ������, ����� ��� ��� �������� ���.
    � ����� � ��� ������ �������� � ����������, ��� ������� ��������� ��� � ��� �������.
*/