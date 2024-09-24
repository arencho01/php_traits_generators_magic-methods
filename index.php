<?php

//assert(true);
//assert(false);


//Трейты, генераторы, магические методы


//1.Почините тест написав код вместо троеточия:
//class A {
//    ...
//}
//assert(
//    "GGGG" ==
//    (new A) . (new A)
//);

//class A
//{
//    function __toString()
//    {
//        return "GG";
//    }
//}
//
//assert(
//    "GGGG" ==
//    (new A) . (new A)
//);



//2. Почините тест написав код вместо троеточия, не используйте __construct()
//class A {
//    private string $a = "gg";
//    ...
//}
//assert(
//    "GG" == (new A)->a;
//);

class A
{
    private string $a = "GG";

    public function __get($property)
    {
        return strtoupper($this->$property);
    }
}

assert(
    "GG" == (new A)->a
);



//3. При помощи trait добавьте классам новый метод, почините тесты заменив троеточие на код
trait UpperNameTrait
{
    public function upperName(): string     //
    {                                       //
        return strtoupper($this->name);     //
    }                                       // тут было троеточие
}
class User
{
    use UpperNameTrait;                     // тут было троеточие
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
class Customer
{
    use UpperNameTrait;                     // тут было троеточие
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

assert(
    (new User('vova'))->upperName() == 'VOVA'
);

assert(
    (new Customer('vova'))->upperName() == 'VOVA'
);