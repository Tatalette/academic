import device
class memory():
    
    def __init__(self):
        self.contain = []
        
    def receive(self,data):
        print("Données reçues apr la mémoire : ", data)
        self.contain = data
        
    def sortie(self)->list:
        print("Sortie des données de la mémoire : ", self.contain)
        return self.contain
    
    def sendToBus(self,Device):
        print("Donnée envoyée au périphérique par la mémoire: ", self.sortie())
        transfer = self.sortie()
        Device.receive(transfer)
        
    def flushData(self):
        self.data=[]