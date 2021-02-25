import requests
import json
import base64
import pandas as pd
import csv

nameShop = 'chung999'
email = 'Chung999kc@gmail.com'
password = '12345'

API_customer = '/admin/api/2021-01/customers.json'
API_key = '86d04b3d81f94c62cd22949a6b0e3c08'
API_password = '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'


def connectByApi():
    access_token = API_key+':'+API_password
    # message_bytes = access_token.encode('ascii')
    # access_token = base64.b64encode(message_bytes)
    url = 'https://{access_token}@{shop}.myshopify.com{api}'.format(
        access_token=access_token, shop=nameShop, api=API_customer)

    response = requests.get(url)
    response.encoding = 'utf-8'
    return response.json()


def save_csv(content):
    df = content
    print('a', df)
    f = csv.writer(
        open("test.csv", "w+", encoding='utf-8', newline=''))

    key = []
    for i in df['customers']:
        del i['addresses']
        key = []
        for j in i:
            key.append(j)
    print(key)
    f.writerow(key)

    for i in df['customers']:
        data = [i[j] for j in i]
        f.writerow(data)
        # print(i)
        #csv_file = i.to_csv(r'./newCsv.csv', index=None, header=True)


content = connectByApi()
save_csv(content)
