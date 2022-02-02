import os
import qrcode

path = os.path.abspath(os.path.dirname(__file__))

if os.path.isdir(path+"\\qrcode"):
    os.rmdir(path+"\\qrcode")



files = os.listdir(path)

for f in files :
    Qr = qrcode.make("hints/"+f)
    Qr.save("Question-"+f.strip(".php")+".png")
print(os.path.basename(__file__))