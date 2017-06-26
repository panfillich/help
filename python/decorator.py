#Декораторы — это, по сути, "обёртки", которые дают нам возможность изменить поведение функции, не изменяя её код.

def makebold(fn):
    def wrapped():
        return "<b>" + fn() + "</b>"

    return wrapped


def makeitalic(fn):
    def wrapped():
        return "<i>" + fn() + "</i>"

    return wrapped


@makebold
@makeitalic
def hello():
    return "hello habr"


print(hello())  ## выведет <b><i>hello habr</i></b>