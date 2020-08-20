from sender import *

while True:
    barcode = raw_input()
    logItem(barcode)
    
    with open('output.txt', 'r') as myfile:
        data=myfile.read().replace('\n', '')

    cost=data[(data.index('Cost')+7):(data.index('Barcode')-3)]
    print cost
