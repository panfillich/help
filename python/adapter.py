# Адаптер (англ. Adapter) — структурный шаблон проектирования, предназначенный для организации использования функций
# объекта, недоступного для модификации, через специально созданный интерфейс.

# Адаптер предусматривает создание класса-оболочки[1] с требуемым интерфейсом.

# !important
# Паттерн Adapter делает именно то, что и означает его название: адаптирует интерфейс одного класса к интерфейсу другого.
# Реализуется он в виде дополнительного класса-посредника. Посредник имплементирует требуемый интерфейс (в нашем случае – MediaHandler ),
# однако всю реальную работу перепоручает другому классу (готовым хендлерам из библиотеки).

# Имплементация - внедрение

class GameConsole:
    def create_game_picture(self):
        return 'picture from console'

class Antenna:
    def create_wave_picture(self):
        return 'picture from wave'

class SourceGameConsole(GameConsole):
    def get_picture(self):
        return self.create_game_picture()

class SourceAntenna(Antenna):
    def get_picture(self):
        return self.create_wave_picture()

class TV:
    def __init__(self, source):
        self.source = source
    def show_picture(self):
        return self.source.get_picture()

g = SourceGameConsole()
a = SourceAntenna()
game_tv = TV(g)
cabel_tv = TV(a)
print(game_tv.show_picture())
print(cabel_tv.show_picture())