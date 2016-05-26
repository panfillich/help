<?php

//Некоторые объекты приходится создавать многократно. 
//есть смысл сэкономить на их инициализации, особенно, 
//если инициализация требует времени и ресурсов. 
//Прототип – это заранее инициализированный и сохранённый объект. 
//В случае необходимости он клонируется:

interface Product{
}


//Какая-то фабрика
class Factory
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getProduct()
    {
        return clone $this->product;
    }
}


class SomeProduct implements Product
{
    public $name;
}


$prototypeFactory = new Factory(new SomeProduct());

$firstProduct = $prototypeFactory->getProduct();
$firstProduct->name = 'The first product';

$secondProduct = $prototypeFactory->getProduct();
$secondProduct->name = 'Second product';

print_r($firstProduct->name);
print_r($secondProduct->name);

//Как видно из примера мы создали два никак не связанных объекта.
