class device():
    
    def __init__(self):
        self.data = None
        
    def receive(self,data):
        print("Donnée reçu par le périphérique")
        self.data = data
    
    def printData(self):
        print("Traduction de la donnée en charactère ASCII :",chr(self.data))
        
    def printDataPara(self):
        print("Traduction de la donnée en charactère ASCII :")
        for i in range (len(self.data)):
            print(chr(self.data[i]))
        
    def flushData(self):
        self.data = []
