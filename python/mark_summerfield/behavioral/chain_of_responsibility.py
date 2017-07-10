# NullHandler - базовый класс для всех обработчиков

class NullHandler:
    # successor - приемник
    # handler - обработчик

    def __init__(self, successor=None):
        self.__successor = successor
        pass

    def handle(self, event):
        if self.__successor is not None:
            self.__successor.handle(event)



