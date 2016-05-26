<?php

//�� � ��������� �� ������� ������ � ���������. 
//�� �������, ����� �� ����� ��������������� �������� �������� �������. 
//�� ������ ��������� �������, ������ ��������� �������� �������� ��������:

/**
 * �����-�� �������
 */
class Product
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }
}

/**
 * �����-�� �������
 */
class Factory
{
    /**
     * @var Builder
     */
    private $builder;


    /**
     * @param Builder $builder
     */
    public function __construct(Builder $builder){
        $this->builder = $builder;
        $this->builder->buildProduct();
    }

    /**
     * ���������� ��������� �������
     *
     * @return Product
     */
    public function getProduct(){
        return $this->builder->getProduct();
    }
}

/**
 * �����-�� ���������
 */
abstract class Builder
{

    /**
     * @var Product
     */
    protected $product;


    /**
     * ���������� ��������� �������
     *
     * @return Product
     */
    final public function getProduct()
    {
        return $this->product;
    }

    /**
     * ������ �������
     *
     * @return void
     */
    public function buildProduct()
    {
        $this->product = new Product();
    }
}

/**
 * ������ ���������
 */
class FirstBuilder extends Builder
{

    /**
     * ������ �������
     *
     * @return void
     */
    public function buildProduct()
    {
        parent::buildProduct();
        $this->product->setName('The product of the first builder');
    }
}

/**
 * ������ ���������
 */
class SecondBuilder extends Builder
{

    /**
     * ������ �������
     *
     * @return void
     */
    public function buildProduct()
    {
        parent::buildProduct();
        $this->product->setName('The product of second builder');
    }
}

/*
 * =====================================
 *            USING OF BUILDER
 * =====================================
 */

$firstDirector = new Factory(new FirstBuilder());
$secondDirector = new Factory(new SecondBuilder());

print_r($firstDirector->getProduct()->getName());
// The product of the first builder
print_r($secondDirector->getProduct()->getName());
// The product of second builder