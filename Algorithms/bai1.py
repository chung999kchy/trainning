# cho 1 dãy số 123456789
# chèn vào giữa các số 1 phép toán (+, - or none) để ra kết quả 100
# yêu cầu:
# - không dùng package itertools
# - không dùng 9 vòng for


s = [1, 2, 3, 4, 5, 6, 7, 8, 9]
dau = ['', '+', '-']
d = ['' for i in range(10)]
kq = []

# kiem tra tong co bang 100 khong?
def Test(i):
    st = ''
    for j in range(i):
        st += str(d[j]) + str(s[j])

    if st[0] != '+':  #dong có '+' o dau cau se giong voi dong ko co dau o dau cau --> bo qua
        if Tinh(st) == 100:  
            kq.append(st)
    

#luoc bot cac ket qua thu duoc
def rutGonKQ():
    b = list(set(kq))   #phan tu doc nhat
    for i in b:
        print(i)

#them dau cho cac vi tri
def Try(i):
    for j in range(3):
        d[i] = dau[j]
        if i < 9:
            Try(i+1)
        if i == 9:
            Test(i)


def Tinh(st):
    num = ''
    lan = 1
    result = 0

    # Xet dau cho so dau tien
    if st[0] != '-':
        d1 = 1
    else:
        d1 = -1

    for i in st:
        if i != '+' and i != '-':
            num += str(i)
        else:
            lan += 1
            if lan == 2:
                if len(num) != 0:
                    #print(d1, num)
                    result += d1 * int(num)
                lan = 1
                num = ''
            if i == "+":
                d1 = 1
            else:
                d1 = -1
    result += d1*int(num)
    return result


Try(0)
rutGonKQ()