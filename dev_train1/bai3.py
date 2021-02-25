import requests
import json
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import pandas as pd
import csv

nameShop = 'chung999'
email = 'Chung999kc@gmail.com'
password = '12345'

API_customer = '/api/2021-01/customers.json'


url = 'https://accounts.shopify.com/store-login'


def connect():
    options = webdriver.ChromeOptions()
    options.add_argument(
        'user-agent = Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36')
    driver = webdriver.Chrome(r'chromedriver.exe')
    driver.get(url)

    print(driver.current_url)
    p = driver.find_element_by_name('shop[domain]')
    p.send_keys(nameShop)
    p = driver.find_element_by_name('commit').click()

    print(driver.current_url)
    u = driver.find_element_by_name('account[email]')
    u.send_keys(email)
    driver.find_element_by_name('commit').click()

    print(driver.current_url)
    wait = WebDriverWait(driver, 100)
    q = wait.until(EC.visibility_of_element_located(
        (By.NAME, 'account[password]')))
    q.send_keys(password)

    wait = WebDriverWait(driver, 100)
    q = wait.until(EC.visibility_of_element_located(
        (By.NAME, 'commit'))).click()

    newUrl = driver.current_url
    newUrl += API_customer
    driver.get(newUrl)
    content = driver.find_element_by_tag_name('pre').text
    parsed_json = json.loads(content)
    return parsed_json


def save_csv(content):
    # with open('data.json', 'w', encoding="utf-8") as f:
    #     f.write(content)
    # df = json.loads(content)
    df = content
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


content = connect()
save_csv(content)
