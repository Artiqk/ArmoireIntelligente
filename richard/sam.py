import serial
import mysql.connector
import time

serial_conn = serial.Serial("/dev/ttyACM0", 9600)

def updateTemperatureAndHumidity (data):
    data = data.replace('T', '')

    now = time.strftime('%Y-%m-%d %H:%M:%S')

    data = data.split(',')

    sql_query = "INSERT INTO etat_armoire (armoire_id, temperature, humidity, updatedAt) VALUES (" + str(data[0]) + "," + str(data[1]) + "," + str(data[2]) + ",'" + str(now) + "');"

    return sql_query

    
def updateQuantity (data, prefix):
    data = data.replace(prefix, '')
    
    now = time.strftime('%Y-%m-%d %H:%M:%S')

    data = data.split(',')

    sql_query = "INSERT INTO armoire_stock (stock_id, quantity, updatedAt) VALUES ('" + str(data[0]) + "', '" + str(data[1]) + "', '" + str(now) + "');"

    return sql_query 

    

db = mysql.connector.connect(
    host="localhost",
    user="webAdmin",
    password="password",
    database="armoire_intelligente"
)

cursor = db.cursor()

while True:
    data = serial_conn.readline()
    data = data.decode("utf-8")
    data = data[:-2]

    prefix = data[0]

    if (prefix == 'T'):
        sql_query = updateTemperatureAndHumidity(data)
        print("Updated temperature and humidity")
    else:
        sql_query = updateQuantity(data, prefix)
        print("Updated quantity")

    try:
        cursor.execute(sql_query)
        db.commit()
    except:
        print("Unexpected error while trying to updated the database")