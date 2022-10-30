from puzzle1 import RFID
import gi
import threading

gi.require_version("Gtk", "3.0")
from gi.repository import Gtk
from gi.repository import Gdk


class MyWindow(Gtk.Window):

    def __init__(self):
        super().__init__(title="Puzzle2")
        self.box = Gtk.Box(orientation=Gtk.Orientation.VERTICAL, spacing=6)
        self.add(self.box)

        self.label1 = Gtk.Label(label="Please log in with your university card")
        self.label1.set_size_request(800,200)
        self.label1.set_name("label1")
        self.box.pack_start(self.label1, True, True, 0)

        self.button2 = Gtk.Button(label="Clear")
        self.button2.connect("clicked", self.clear)
        
        self.box.pack_start(self.button2, True, True, 0)
        
        #define blue style
        self.blue = b""" 
                
        #label1{
            background-color: #29c8f6;
            font: bold 24px Calibri;
            color:#FFFFFF;
            }
               
        """
        self.red = b"""
        
         #label1{
            background-color: #dd1432;
            font: bold 24px Calibri;
            color: #FFFFFF;
            }
       
                    
                    
        """
        
        self.css_provider = Gtk.CssProvider() #Adding styles
        self.css_provider.load_from_data(self.blue) 
        self.context = Gtk.StyleContext()
        self.screen = Gdk.Screen.get_default()
        self.context.add_provider_for_screen(self.screen, self.css_provider, Gtk.STYLE_PROVIDER_PRIORITY_APPLICATION)

                
        self.thread=threading.Thread(target=self.uid, daemon=True)
        self.thread_in_use=True
        self.thread.start()
        
    def clear(self, widget):
        if(self.thread_in_use=False)
            self.label1.set_text("Please log in with your university card")
            self.css_provider.load_from_data(self.blue)
            self.thread=threading.Thread(target=self.uid,daemon=True)
            self.thread_in_use=True
            self.thread.start()
        
    
    def uid(self):
        pn532=RFID()
        card=pn532.read_uid()
        self.label1.set_text("UID:  "+card.upper())
        self.thread_in_use=False
        self.css_provider.load_from_data(self.red)
  
        
win = MyWindow()
win.connect("destroy", Gtk.main_quit)
win.show_all()
Gtk.main()






