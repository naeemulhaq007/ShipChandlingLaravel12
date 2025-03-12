from PIL import Image
import pytesseract

image = Image.open("assets/images/card.jpg")

text = pytesseract.image_to_string(image)

print(text)
