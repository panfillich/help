# Паттерн Абстрактная фабрика предназначен для случаев, когда тре-
# буется создать сложный объект, состоящий из других объектов, при-
# чем все составляющие объекты принадлежат одному «семейству».
# Например, в системе с графическим пользовательским интерфей-
# сом может быть абстрактная фабрика виджетов, которой наследуют
# три конкретные фабрики: MacWidgetFactory , XfceWidgetFactory и
# WindowsWidgetFactory , каждая из которых предоставляет методы
# для создания одних и тех же объектов ( make_button() , make_spin-
# box() и т. д.), стилизованных, однако, как принято на конкретной
# платформе. Это дает возможность создать обобщенную функцию
# create_dialog() , которая принимает экземпляр фабрики в качестве
# аргумента и создает диалоговое окно, выглядящее, как в OS X, Xfce
# или Windows, – в зависимости от того, какую фабрику мы передали.


def main():

    # Первым делом мы определяем два имени файла (не показано).
    # Затем мы порождаем рисунок с помощью фабрики простого текста,
    # подразумеваемой по умолчанию (➊), и сохраняем его. После этого
    # мы точно так же порождаем и сохраняем рисунок, но на этот раз с
    # помощью фабрики SVG (➋).

    txtDiagram = create_diagram(DiagramFunctory()) # ➊
    txtDiagram.save()

    svgDiagram = create_diagram(SvgDiagramFactory()) # ➋
    svgDiagram.save()



# Эта функция принимает фабрику рисунков и с ее помощью созда-
# ет требуемый рисунок. Ей совершенно безразлично, какую конкрет-
# но фабрику она получила, лишь бы та поддерживала определенный
# нами интерфейс. О методах make_...() мы поговорим чуть ниже.

def create_diagram(factory):
    diagram = factory.make_diagram(30, 7)
    rectangle = factory.make_rectangle(4, 1, 22, 5, "yellow")
    text = factory.make_text(7, 3, "Abstract Factory")
    diagram.add(rectangle)
    diagram.add(text)
    return diagram


# Разобравшись с тем, как фабрики используются, мы можем обра-
# титься к самим фабрикам. Вот код простой фабрики текстовых ри-
# сунков (которая заодно является базовым классом для фабрик):
class DiagramFunctory:
    def make_diagram(self, width, height):
        return Diagram(width, height)
    def make_rectangle(self, x, y, width, height, fill="white", stroke="black"):
        return Rectangle(x, y, width, height, fill, stroke)
    def make_text(self, x, y, text, fontsize=12):
        return Text(x, y, text, fontsize)

# Несмотря на слово «абстрактная» в названии паттерна, часто бы-
# вает, что один и тот же класс служит и базовым классом, определяю-
# щим интерфейс (то есть абстракцию), и самостоятельным конкрет-
# ным классом. Именно так мы и поступили в классе DiagramFactory .

# Вот первые несколько строчек фабрики SVG:

class SvgDiagramFactory(DiagramFunctory):
    def make_diagram(self, width, height):
        return SvgDiagram(width, height)
    def make_rectangle(self, x, y, width, height, fill="white", stroke="black"):
        return SvgRectangle(x, y, width, height, fill, stroke)
    def make_text(self, x, y, text, fontsize=12):
        return SvgText(x, y, text, fontsize)


class Diagram():
    def __init__(self, width, height):
        self.width = width
        self.height = height
        self.components = []

    def add(self, component):
        self.components.append(component)

    def save(self):
        for component in self.components:
            print(component.show())

class SvgDiagram(Diagram):
    pass


class Rectangle():
    def __init__(self, x, y, width, height, fill, stroke):
        self.x = x
        self.y = y
        self.width = width
        self.height = height
        self.fill = fill
        self.stroke = stroke
        self.setName()

    def setName(self):
        self.name = "Rectangle"

    def show(self):
        return "%s with param: x=%s, y=%s, width=%s, height=%s, fill=%s, stroke=%s" % (
            self.name, self.x, self.y, self.width, self.height, self.fill, self.stroke)

class SvgRectangle(Rectangle):
    def setName(self):
        self.name = "SvgRectangle"

class Text():
    def __init__(self, x, y, text, fontsize):
        self.x = x
        self.y = y
        self.text = text
        self.fontsize = fontsize
        self.setName()

    def setName(self):
        self.name = "Text"

    def show(self):
        return "%s with param: x=%s, y=%s, text=%s, fontsize=%s" % (
            self.name, self.x, self.y, self.text, self.fontsize)

class SvgText(Text):
    def setName(self):
        self.name = "SvgText"

main()









