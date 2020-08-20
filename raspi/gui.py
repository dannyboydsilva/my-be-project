from tkinter import *
import initiation
import time
import sys
initiation.init()


total=0
n=0


def close_window():
    window.destroy()
    window1
######## main:


window=Tk()
window.title("Cart project")
window.configure(background="lavender")
window.geometry('1500x350+0+0')

TitleFrame=Frame(window,width=1500,height=50,bd=9, relief="groove")
TitleFrame.pack(side=TOP)
LeftFrame=Frame(window,width=1000,height=1400,bd=9, relief="raise")
LeftFrame.pack(side=TOP)
TotalFrame=Frame(window,width=1000,height=100,bd=9, relief="raise")
TotalFrame.pack(side=BOTTOM)
RightFrame=Frame(window,width=300,height=450,bd=9, relief="groove")
RightFrame.pack(side=RIGHT,padx=40)


############## label
Label (TitleFrame, text="Hey Customer! Here's your items. Hit pay now. We promise you will be done in no time! :)", bg="white",fg="black", font="Helvetica 18 bold", width=0) .grid(row=0, column=0, sticky=N)
Label (LeftFrame, text="Sr. No", bg="white",fg="black", font="none 12 bold", width=0) .grid(row=0, column=0, sticky=N,padx=100)
Label (LeftFrame, text="Iname", bg="white",fg="black", font="none 12 bold",width=0) .grid(row=0, column=1,sticky=N,padx=100)
Label (LeftFrame, text="Quantity", bg="white",fg="black", font="none 12 bold",width=0) .grid(row=0, column=2,sticky=N,padx=100)
Label (LeftFrame, text="Cost", bg="white",fg="black", font="none 12 bold",width=0) .grid(row=0, column=3,sticky=N,padx=100)

#totals out the bill in a grid fashion
for i in range(1,5):
    Label (LeftFrame, text=i, bg="white",fg="black", font="none 12 bold",width=20) .grid(row=i, column=0,sticky=N)
    Label (LeftFrame, text=initiation.iname[i], bg="white",fg="black", font="none 12 bold",width=20) .grid(row=i, column=1,sticky=N)
    Label (LeftFrame, text=initiation.quantity[i], bg="white",fg="black", font="none 12 bold",width=20) .grid(row=i, column=2,sticky=N)
    Label (LeftFrame, text=initiation.cost[i], bg="white",fg="black", font="none 12 bold",width=20) .grid(row=i, column=3,sticky=N)
    total=total+initiation.cost[i]



## shows the grand total with calcuated sum
    Label (TotalFrame, text="Grand Total", bg="white",fg="black", font="none 20 bold",width=20) .grid(row=0, column=0,sticky=W,padx=150)
    Label (TotalFrame, text=total, bg="white",fg="black", font="none 20 bold",width=20) .grid(row=0, column=3,sticky=E,padx=150)



#### button
Button(RightFrame, text="PAY NOW", width=10, font="Helvetica",foreground="red",command=close_window) .grid(row=0, column=0, sticky=N)

#### Pay now
window1=Tk()
window1.title("Cart project")
window1.configure(background="lavender")
window1.geometry('1500x350+0+0')


Label (window1, text="Your payment is almost been done!", bg="white",fg="black", font="none 12 bold",width=0) .grid(row=10, column=4,padx=100)



window.mainloop()
