import random as rd
import pymysql


bravo = pymysql.connect(host='localhost', port=3306, user='root',
                        passwd='root', db='bravo')
db = bravo.cursor()

for i in range(5):  # temperature
    tem = rd.normalvariate(26, 8)
    while tem <= 10:
        tem += 5
    while tem >= 40:
        tem -= 5
    db.execute(
        "UPDATE `sensor` SET `value` = '%.1f' WHERE `sensor`.`idsensor` = %d;" % (tem, i))

for i in range(5, 10):  # humidity
    hum = rd.normalvariate(50, 20)
    while hum <= 10:
        hum += 10
    while hum >= 90:
        hum -= 10
    db.execute(
        "UPDATE `sensor` SET `value` = '%.1f' WHERE `sensor`.`idsensor` = %d;" % (hum, i))

for i in range(10, 15):  # brightness
    bri = rd.normalvariate(50, 30)
    while bri <= 0:
        bri += 10
    while bri >= 100:
        bri -= 10
    db.execute(
        "UPDATE `sensor` SET `value` = '%.1f' WHERE `sensor`.`idsensor` = %d;" % (bri, i))

body = rd.normalvariate(37, 2)
while body <= 35:
    body += 1
while body >= 40:
    body -= 1
db.execute(
    "UPDATE `sensor` SET `value` = '%.1f' WHERE `sensor`.`idsensor` = 25;" % (body))


try:
    # 提交到数据库执行
    bravo.commit()
except:
    # 发生错误时回滚
    bravo.rollback()

db.close()
