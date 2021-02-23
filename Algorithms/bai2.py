# cho trước 2 số y, x (y > x). Có 2 cách thay đổi giá trị của x:
# 	- tăng gấp đôi x
# 	- bớt x đi 1 đơn vị
# Tìm số bước nhỏ nhất để x = y.


class node:
    def __init__(self, val, level):
        self.val = val
        self.level = level

#BFS
def findStep(x, y):
    visit = set()
    q = []
    n = node(x,0)
    q.append(n)
    while len(q) != 0:
        t = q[0]
        if (t.val == y):
            return t.level

        visit.add(t.val)

        if (t.val * 2 == y or t.val - 1 == y):
            return t.level+1

        if (t.val * 2 not in visit):
            n1 = node(t.val * 2,t.level + 1)
            q.append(n1)
        if (t.val - 1 >= 0 and t.val - 1 not in visit):
            n2 = node(t.val-1,t.level + 1)            
            q.append(n2)
        q.pop(0)


if __name__ == '__main__':

    x = int(input())
    y = int(input())
    print('kq = ', findStep(x, y))
