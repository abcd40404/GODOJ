import requests
from bs4 import BeautifulSoup
from selenium import webdriver

driver = webdriver.PhantomJS(executable_path='/home/kamikaze/workspace/phantomjs-2.1.1-linux-x86_64/bin/phantomjs')
driver.get('http://codeforces.com/contest/798/problem/A')
html = driver.page_source
driver.close()

# res = requests.get()
soup = BeautifulSoup(html, "lxml")
# print(soup.select('.problem-statement')[0].text)
for problem in soup.select('.problem-statement'):
    print (problem.select('.title')[0].text)
    print (problem.select('.time-limit')[0].text)
    print (problem.select('.memory-limit')[0].text)
    print (problem.select('.input-file')[0].text)
    print (problem.select('.output-file')[0].text)
    print(problem.contents[1].text)
    # d = problem.children
    # print(d)
    # for p in problem.select('p'):
        # print(p.text)

inp_spec = soup.select('.input-soecification')
out_spec = soup.select('.output-soecification')
for inp in soup.select('.input'):
    print (inp.select('pre')[0].text)
for out in soup.select('.output'):
    print(out.select('pre')[0].text)

# print(soup.select('.input')[1].text)
# for problem in soup.select('.problem-statement'):
#     res = problem.find_all('div')
#     print(res[0].text)
#     print(res[1].text)
#     print(problem.select('.title')[0].text)
#     print(problem.select('.time-limit')[0].text)
#     print(problem.select('.memory-limit')[0].text)
#     print(problem.select('.input-file')[0].text)
#     print(problem.select('.output-file')[0].text)
#     print(problem.find('div').text)
