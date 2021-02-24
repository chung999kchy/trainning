import mysql.connector
import pandas as pd
import numpy as np
from datetime import datetime, date

nameDatabase = 'train1_db'
conn = mysql.connector.connect(user='root', password='12345', host='localhost', database=nameDatabase,
                               auth_plugin='mysql_native_password')
print(conn)
cur = conn.cursor()

file = pd.read_csv('./customer.csv',  encoding='utf-8', header=0, sep=',')
df = file.replace(np.nan, '', regex=True)
data1 = df.to_numpy()
nameCol = file.columns.values.tolist()
data = []


def createMsgCreateTable():
    msg = 'create table IF NOT EXISTS customer ('
    for i in range(len(nameCol)):
        # check time
        if isinstance(data[0][i], date) or isinstance(data[0][-1], datetime):
            msg += nameCol[i] + ' datetime,'
        elif isinstance(data[0][i], int):
            msg += nameCol[i] + ' int,'
        else:
            msg += nameCol[i] + ' varchar(255),'
    msg = msg[:-1]+');'
    return msg


def executeMsgCreate(message):
    try:
        cur.execute(message)
    except:
        conn.rollback()


def executeMsgInsert(message, data):
    try:
        cur.executemany(message, data)
        conn.commit()
    except:
        conn.rollback()
    print(cur.rowcount, "record inserted!")


def convertDataToTuple(data1):
    data2 = []
    for row in data1:
        x = tuple(row)
        data2.append(x)
    return data2


def createMsgInsert():
    msg = 'insert into customer ('
    for name in nameCol:
        msg += name+', '
    msg = msg[:-2] + ' ) values ('
    for i in range(len(nameCol)):
        msg += ' %s,'
    msg = msg[:-1]+');'
    return msg


if __name__ == '__main__':

    data = convertDataToTuple(data1)
    # print(data)
    msgCreate = createMsgCreateTable()
    print(msgCreate)
    executeMsgCreate(msgCreate)

    msgInsert = createMsgInsert()
    print(msgInsert)
    executeMsgInsert(msgInsert, data)
