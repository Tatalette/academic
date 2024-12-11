import processor as pro
import memory as mem
import device as dev

class bus():    
    
    #Initialisation des composants
    dataList = (0b10110000,0b00010011,0b01010101,0b00000011,0b00000001,0b00000010)
    IntelPentiumCore1 = pro.processor()
    IntelPentiumCore2 = pro.processor()
    ram1 = mem.memory()
    clavier = dev.device()
    
    #Exercices
    """
    IntelPentiumCore1.sendToBus(ram1)
    
    ram1.sendToBus(clavier)
    clavier.printData()
    """
    #Data
    IntelPentiumCore1.putValues(dataList[0],dataList[1],dataList[2])
    IntelPentiumCore2.putValues(dataList[3],dataList[4],dataList[5])
    coreList = [IntelPentiumCore1,IntelPentiumCore2]
    
    def transitData(listCore:list,ram,device):
        #On boucle sur chaque coeur 
        for i in range(len(listCore)):
            print(" /nEnvoie des données du coeur ",i)
            #Ensuite on récupère les données sous forme de liste, et on boucle dessus
            for j in range(len(listCore[i].sortie())):
                listCore[i].sendToBus(ram,j)
                ram.sendToBus(device)
                device.printData()
        ram.flushData()
        device.flushData()
    # transitData(coreList,ram1,clavier)
    
    def transitDataBis(listCore:list,ram,device,paralellism:bool):
        if paralellism:
            for i in range(len(listCore)):
            #Ensuite on récupère les données sous forme de liste, et on boucle dessus
                listCore[i].sendToBusPara(ram)
                ram.sendToBus(device)
                device.printDataPara()
        else:
            for i in range(len(listCore)):
            #Ensuite on récupère les données sous forme de liste, et on boucle dessus
                for j in range(len(listCore[i].sortie())):
                    listCore[i].sendToBus(ram,j)
                    ram.sendToBus(device)
                    device.printData()
        ram.flushData()
        device.flushData()
    
    transitDataBis(coreList,ram1,clavier,True)
    transitDataBis(coreList,ram1,clavier,False)