# Шаблон мост (англ. Bridge) — структурный шаблон проектирования, используемый в проектировании программного
# обеспечения чтобы «разделять абстракцию и реализацию так, чтобы они могли изменяться независимо». Шаблон мост
# использует инкапсуляцию, агрегирование и может использовать наследование для того, чтобы разделить ответственность
# между классами.

# Проблема
# Отделить абстракцию от реализации так, чтобы и то и другое можно было изменять независимо. При использовании наследования
# реализация жестко привязывается к абстракции, что затрудняет независимую модификацию.

# http://streletzcoder.ru/pattern-most-bridge-opisanie-i-primer-realizatsii/


#   Abstarction – абстракция.
#   Определяет интерфейс абстракции и хранит ссылку на объект Implementor;

#   Implementor – реализатор.
#   Определяет интерфейс реализации. Интерфейс реализации необязательно должен совпадать с интерфейсом абстрации;

#   ConcretteImplementor – конкретный реализатор.
#   Содержит конкретную реализацию интерфейса класса Implementor;

#   Client – использует объекты Abstraction.



import abc

class Abstraction:
    """
    Define the abstraction's interface.
    Maintain a reference to an object of type Implementor.
    """

    def __init__(self, imp):
        self._imp = imp

    def operation(self):
        self._imp.operation_imp()


class Implementor(metaclass=abc.ABCMeta):
    """
    Define the interface for implementation classes. This interface
    doesn't have to correspond exactly to Abstraction's interface; in
    fact the two interfaces can be quite different. Typically the
    Implementor interface provides only primitive operations, and
    Abstraction defines higher-level operations based on these
    primitives.
    """

    @abc.abstractmethod
    def operation_imp(self):
        pass


class ConcreteImplementorA(Implementor):
    """
    Implement the Implementor interface and define its concrete
    implementation.
    """

    def operation_imp(self):
        pass


class ConcreteImplementorB(Implementor):
    """
    Implement the Implementor interface and define its concrete
    implementation.
    """

    def operation_imp(self):
        pass


def main():
    concrete_implementor_a = ConcreteImplementorA()
    abstraction = Abstraction(concrete_implementor_a)
    abstraction.operation()


if __name__ == "__main__":
    main()
