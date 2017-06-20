# порождающие (creational)

class Singleton1(type):
    def __init__(cls, *args, **kw):
        super(Singleton1,cls).__init__(*args, **kw)
        cls.instance = None
    def __call__(cls, *args, **kw):
        if cls.instance is None:
            cls.instance = super(Singleton1,cls).__call__(*args,**kw)
        return cls.instance

class Singleton2(type):
    _instances = {}
    def __call__(cls, *args, **kwargs):
        if cls not in cls._instances:
            cls._instances[cls] = super(Singleton2, cls).__call__(*args, **kwargs)
        return cls._instances[cls]

class Logger(metaclass=Singleton1):
    pass

L1 = Logger()
print(L1)

L2 = Logger()
print(L2)

print(L1 == L2)
# True

# Немного о метаклассах

# Итак, классический ООП подразумевает наличие только классов и объектов.
# Класс -шаблон для объекта; при объявлении класса указывается вся механика
# работы каждого конкретного «воплощения»: задаются данные, инкапсулируемые
# в объекте, и методы для работы этими данными.

# Питон расширяет классическую парадигму, и сами классы в нем тоже становятся
# равноправными объектами, которые можно менять, присваивать переменной и
# передавать в функции. Но если класс — объект, то какому классу он соответствует?
# По умолчанию этот класс (метакласс) называется type.

# От метакласса можно наследоваться, получая новый метакласс, который, в свою
# очередь, можно использовать при определении новых классов. Таким образом,
# появляется новое «измерение» наследования, добавляющееся к иерархии наследования
# классов: метакласс -> класс -> объект