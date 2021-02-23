# cho trước 2 số y, x (y > x). Có 2 cách thay đổi giá trị của x:
# 	- tăng gấp đôi x
# 	- bớt x đi 1 đơn vị
# Tìm số bước nhỏ nhất để x = y.


x = int(input())
y = int(input())
turn = 0

while x != y:
    if x < y:
        x *= 2
        turn += 1
    else:
        x -= 1
        turn += 1
print(turn)
