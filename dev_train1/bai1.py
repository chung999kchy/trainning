import requests
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from bs4 import BeautifulSoup


# Fill in your details here to be posted to the login form.
url = 'http://45.79.43.178/source_carts/wordpress/wp-login.php'


def useRequest():
    values = {'log': 'admin',
              'pwd': '123456aA'}
    with requests.Session() as s:
        req = s.post(url, data=values)
        soup = BeautifulSoup(req.text, "lxml")
        columns = soup.findAll('span', attrs={'class': 'display-name'})
        for i in columns:
            print(i.text)


def useSelenium():
    options = webdriver.ChromeOptions()
    options.add_argument(
        'user-agent = Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36')
    driver = webdriver.Chrome(r'chromedriver.exe')
    driver.get(url)

    u = driver.find_element_by_name('log')
    u.send_keys('admin')
    p = driver.find_element_by_name('pwd')
    p.send_keys('123456aA')
    p = driver.find_element_by_name('wp-submit').click()
    text = driver.find_element_by_class_name('display-name').text
    print(text)
    driver.close()


useSelenium()
# useRequest()
