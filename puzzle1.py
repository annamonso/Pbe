from py532lib .i2c import*
from py532lib.frame import*
from py532lib.constants import*

class RFID:
        def main(self):
                pn532=Pn532_i2c()
                pn532.SAMconfigure();
                card_data= pn532.read_mifare().get_data()
#passar de bytearray a hexadecimal
                card_info=int.from_bytes(card_data,byteorder='big', signed=True)
                card_hexa= hex(card_info)
                card=''
                for i in range(16,len(card_hexa)):
                        card=card+str(card_hexa[i])
                print (card.upper())
if __name__=='__main__':
        pn532=RFID()
        pn532.main()
