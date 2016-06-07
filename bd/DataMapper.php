<?php 
//¬ DataMapper мы выносим код сохранени€/загрузки сущностей (и все что св€зано с базой данных) в отдельный класс. 
//¬от пример такого класса: 

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


/*¬ данном случае, класс Foo намного проще и должен беспокоитьс€ только о своей бизнес-логике. ќн не только не должен сохран€ть собственные данные, он даже не знает и не заботитс€ о том, все ли его данные были сохранены.

ѕреимущества Data Mapper-а

     аждый объект имеет свою зону ответственности, тем самым следую принципам SOLID и сохран€€ каждый объект простым и по существу.
    Ѕизнес-логика и сохранение данных св€заны слабо, и если вы хотите сохран€ть данные в XML-файл или какой-нибудь другой формат, вы можете просто написать новый Mapper, не притрагива€сь к доменному объекту.


Ќедостатки Data Mapper-а

    ¬ам придетс€ гораздо больше думать, перед тем как написать код.
    ¬ итоге у вас больше объектов в управлении, что немного усложн€ет код и его отладку.
*/