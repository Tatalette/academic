import L3Lang as l3
def main():
    listeT1 = [1,8,7,6,4]
    listeT2 = [1,8,7,6,6]
    listeT3 = [4,2,6,1,9]
    print("#----------#")
    print("Test add avec liste ",listeT1)
    l3.add(listeT1)
    print("Liste après add : ",listeT1)
    listeT1 = [1,8,7,6,4]
    print("#----------#")
    print("Test eql avec ",listeT1," et ",listeT2)
    l3.eql(listeT1)
    l3.eql(listeT2)
    print("Résultat listeT1 : ",listeT1)
    print("Résultat listeT2 : ",listeT2)
    listeT1 = [1,8,7,6,4]
    listeT2 = [1,8,7,6,6]
    print("#----------#")
    print("Test prn avec ",listeT1)
    l3.prn(listeT1)
    print("Résultat : ",listeT1)
    listeT1 = [1,8,7,6,4]
    print("#----------#")
    print("Test d'un entier 20 avec ",listeT1)
    l3.inn(listeT1,20)
    print("Résultat : ",listeT1)
    listeT1 = [1,8,7,6,4]
    print("#----------#")
    print("Test de intC avec index = 4 puis 7 avec la valeyr -7 sur la liste ",listeT1)
    l3.intC(listeT1,-7,4)
    print("Réstulat avec index 4 ",listeT1)
    listeT1 = [1,8,7,6,4]
    l3.intC(listeT1,-7,7)
    listeT1 = [1,8,7,6,4]
    print("#----------#")
    print("Test de ldiv avec 8 sur la liste ",listeT1)
    l3.ldiv(listeT1,8)
    print("Résultat : ",listeT1)
    listeT1 = [1,8,7,6,4]
    print("#----------#")
    print("Test de ldaa avec 1 et 3 sur ",listeT1)
    l3.ldaa(listeT1,1)
    print("Résultat avec 1 : ",listeT1)
    listeT1 = [1,8,7,6,4]
    l3.ldaa(listeT1,3)
    print("Résultat avec 3 : ",listeT1)
    listeT1 = [1,8,7,6,4]
    print("#----------#")
    print("test ldv avec la liste : ",listeT1," sur l'index 1 puis 9")
    l3.ldv(listeT1,3)
    print("Résultat index 1 ",listeT1)
    listeT1 = [1,8,7,6,4]
    l3.ldv(listeT1,9)
    print("Résulat index 9 ",listeT1)
    listeT1 = [1,8,7,6,4]
    print("#----------#")
    print("Test sto avec ",listeT3," puis avec ",listeT1)
    l3.sto(listeT3)
    print("Résultat première liste : ",listeT3)
    l3.sto(listeT1)
    print("Résultat deuxième liste : ",listeT1)
    print("#----------#")
    index = [3]
    print("Test brni vec index = ",index," et instruction = 8")
    l3.brni(index,8)
    print("Résultat index = " ,index)
    index = [3]
    print("Test brni avec index = ",index ," et instruction = 0" )
    l3.brni(index,0)
    print("Résultat index = ",index)
    
    
main()