from random import randrange
from requests import get
from time import sleep

while True:
    get('http://eurochat.herokuapp.com/index.php')
    sleep(300 * randrange(1,5))
