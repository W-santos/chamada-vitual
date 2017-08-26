import cv2
import numpy as np
import sys

def data_uri_to_cv2_img(uri):
    encoded_data = uri.split(',')[1]
    nparr = np.fromstring(encoded_data.decode('base64'), np.uint8)
    img = cv2.imdecode(nparr, cv2.IMREAD_COLOR)
    return img

print("Done")
with open("data.txt","r") as f:
	data_uri = f.read()

with open("saida.txt","w") as saida:
	saida.write("Teste")

img = data_uri_to_cv2_img(data_uri)
	
cv2.imwrite("Teste.jpg",img)

