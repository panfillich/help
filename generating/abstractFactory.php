<?php

//Абстрактная фабрика (Abstract Factory)
//Бывает ситуация, когда у нас есть несколько однотипных фабрик и мы хотим инкапсулировать логику выбора, 
//какую из фабрик использовать для той или иной задачи. Тут-то нам на помощь и приходит этот шаблон.

class Config
{
    public static $factory = 1;
}

interface Product
{
    public function getName();
}

//Абстрактная фабрика
abstract class AbstractFactory
{
    public static function getFactory()
    {
        switch (Config::$factory) {
            case 1:
                return new FirstFactory();
            case 2:
                return new SecondFactory();
        }
        throw new Exception('Bad config');
    }

    abstract public function getProduct();
}


class FirstFactory extends AbstractFactory
{
    public function getProduct()
    {
        return new FirstProduct();
    }
}

class FirstProduct implements Product
{
    public function getName()
    {
        return 'The product from the first factory';
    }
}

class SecondFactory extends AbstractFactory
{
    public function getProduct()
    {
        return new SecondProduct();
    }
}

class SecondProduct implements Product
{
    public function getName()
    {
        return 'The product from second factory';
    }
}


$firstProduct = AbstractFactory::getFactory()->getProduct();
Config::$factory = 2;
$secondProduct = AbstractFactory::getFactory()->getProduct();

print_r($firstProduct->getName());
// The first product from the first factory
print_r($secondProduct->getName());
// Second product from second factory


//Как видно из примера, нам не приходится заботится о том, какую фабрику взять. 
//Абстрактная фабрика сама проверяет настройки конфигурации и возвращает подходящую фабрику. 
//Разумеется, вовсе не обязательно абстрактная фабрика должна руководствоваться файлу конфигурации. 
//Логика выбора может быть любой.
