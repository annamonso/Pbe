from py532lib.i2c import*
from py532lib.frame import*
from py532lib.constants import*

pn532=Pn532_i2c()
pn532.SAMconfigure();

class RFID:
    card_data=pn532.read_mifare().get_data()
    card_info=int.from_bytes(card_data,byteorder='big',signed=True)
    card_hexa=hex(card_info)
    card=''
    for i in range(16,len(card_hexa)):
        card=card+str(card_hexa[i])
    print(card.upper())