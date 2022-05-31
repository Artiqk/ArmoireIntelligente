import serial
import mysql.connector

serial_conn = serial.Serial("/dev/ttyACM0", 115200)

db = mysql.connector.connect(
    host="localhost",
    user="webAdmin",
    password="password",
    database="armoire_intelligente"
)

cursor = db.cursor()

while True:
    tag = serial_conn.readline()
    tag = tag.decode("utf-8")
    tag = tag[:-2]

    sql_query = "SELECT username FROM users WHERE rfid_pass = '" + tag + "';"

    cursor.execute(sql_query)

    user = cursor.fetchall()[0][0]
    
    print(user)

serial_conn.close()