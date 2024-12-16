# -*- coding: utf-8 -*-
"""
Created on Thu Dec 12 14:11:09 2024

@author: PC
"""


#Initalisation des variables
typeMenuList = np.empty(10,str)
typeSiteList = np.empty(10,str)
colorList = np.empty(10)
contrastList = np.empty(10,float)
scrollList = np.empty(10,bool)
nbElementList = np.empty(10,int)
elementSizeList = np.empty(10,float)
searchBarList = np.empty(10,bool)

def extractData(jsonFile)->list:
    with open(jsonFile) as f:
        d = json.load(f)
        print(d)
    return d

def putDataList(extractData:dict):
    global typeMenuList, typeSiteList, colorList, contrastList, scrollList
    global nbElementList, elementSizeList, searchBarList 
    for choice in extractData.items():
        typeMenuList = np.append(choice['typeMenu'])
        typeSiteList = np.append(choice['typeSite'])
        colorList = np.append(choice['color'])
        contrastList = np.append(choice["contrast"])
        scrollList = np.append(choice["scroll"])
        nbElementList = np.append(choice["nbElement"])
        elementSizeList = np.append(choice["elementSize"])
        searchBarList = np.append(choice["searchBar"])

def Main(jsonFile):
    putDataList(extractData(jsonFile))

from collections import Counter
    
class manipulation():
    
    def valueTypeSite(typeList:list)->dict:
        #initialisation des variables 
        i = 0
        b = 0 #blog
        e = 0 #eshop
        v = 0 #vitrine
        while i <= len(typeList) or 6 not in [b,e,v]:
            if typeList[i]=='blog':
                b += 1;
            elif typeList[i=='eshop']:
                e += 1;
            else:
                v += 1;
            i+=1
        if max[b,e,v]==b:
            return {'typeSite','blog'}
        elif max[b,e,v]==e:
            return {'typeSite ,'}
    
    def returnSite(typeList:list)->dict:
        count = Counter(typeList)
        print(count)
#fonction pour retourner les critères selon les choix
def returnDataChoice(choice:dict,pictureList:dict)->list:
    listChoix = np.array([])
    for value in choice:
        listChoix = np.append(pictureList[value])
    return listChoix

#retourne la valeur choisie d'un dictionnaire
def getValues(firstKey:dict,secondKey:str):
    return firstKey[secondKey]

#retourne la valeure qui a une récurrence maximale selon la clé
def returnMaxValues(listChoice,key:str):
    liste = []
    for e in listChoice:
        liste.append(getValues(e,key))
    return max(Counter(liste),key=Counter(liste).get)

