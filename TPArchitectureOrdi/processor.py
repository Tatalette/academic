import memory
class processor():
    
    #Constructor
    
    def __init__(self,value1:str,value2:str,value3:str):
        self.value1 = value1
        self.value2 = value2
        self.value3 = value3
        
    def __init__(self):
        pass
    
    #Return value in list
    def sortie(self)->list:
        return [self.value1,self.value2,self.value3]
    
    def putValues(self,value1:str,value2:str,value3:str):
        print("nouvelles données dans le processeur : ",value1,value2,value3)
        self.value1 = value1
        self.value2 = value2
        self.value3 = value3
    
    #Methods
    
    def sendToBus(self,Memory,slot:int):
        print("extraction des données du processeur en série")
        transfer = self.sortie()[slot]
        print("envoie de la donnée à la mémoire par le processeur : ",transfer)
        Memory.receive(transfer)
        
    def sendToBusPara(self,Memory):
        print("extraction des données du processeur en parallèle")
        transfer = self.sortie()
        print("envoie de la donnée à la mémoire par le processeur : ",transfer)
        Memory.receive(transfer)
    
        
        