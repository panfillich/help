<?php

//Допустим, мы знаем, что бывают фабрики, производящие какой-то свой продукт. 
//Нам не важно, как именно фабрика делает этот продукт, но мы знаем, 
//что у любой фабрики есть один универсальный способ попросить его

// + Мы должны иметь возможность достаточно просто добавлять новые типы
//	продуктов

interface Factory{
	//Фабричный метод
	public function getProduct();
}

interface Product{
	public function getName();
}

// 1 фабрика
class FirstFactory implements Factory{
	public function getProduct(){
		return new FirstProduct();
	}
} 
// 1 продукт
class FirstProduct implements Product{
    public function getName(){
        return 'The first product';
    }
}

// 2 фабрика
class SecondFactory implements Factory{
    public function getProduct(){
        return new SecondProduct();
    }
}
// 2 продукт
class SecondProduct implements Product{
    public function getName(){
		return 'Second product';
    }
}

$factory = new FirstFactory();
$firstProduct = $factory->getProduct();
$factory = new SecondFactory();
$secondProduct = $factory->getProduct();

print_r($firstProduct->getName().'<br />');
print_r($secondProduct->getName());

//В данном примере метод getProduct() является фабричным.