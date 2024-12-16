# -*- coding: utf-8 -*-
"""
Created on Thu Dec 12 11:31:14 2024

@author: PC
"""
from collections import Counter
import json
import extract as ex

with open('selection.json') as f:
    fileSelect = json.load(f)

with open('description_images_gb.json') as f:
    fileBase = json.load(f)

PONDERATION = {
    "typeSite":10, #str
    "typeMENU":0.3, #str
    "couleurDominante":8, #Hex
    "paletteCouleurs":6, #Hex
    "contraste":2, #float
    "scroll":0.1, #str
    "nbElement":0.05, #int
    "elementSize":0.15, #float
    "searchBar":0.8, #bool
    "layout":0.5, #str
    "typographie":0.15, #str
    "taillePolice":0.2, #str
    "boutonsActions":0.8, #int
    "barreNavigation":0.75, #str
    "densiteVisuelle":0.6, #str
    "contenuPrincipal":0.9, #str
    "theme":0.9, #str
    "presenceImages":0.8, #bool
    "presenceGraphiques":0.7 #bool
}
test1 = fileBase[0]['criteria']
test2 = fileBase[1]['criteria']
test3 = fileBase[2]['criteria']
test4 = fileBase[3]['criteria']
print("Pour : ", test4['typeSite'], test3['typeSite'])
print(ex.comparaison(test4,test3,'typeSite'))
print("Pour : ", test4['typeSite'], test2['typeSite'])
print(ex.comparaison(test4,test2,'typeSite'))
print("--------------")
print("Pour : ", test3['searchBar'],test2['searchBar'])
print(ex.comparaison(test3,test2,'searchBar'))
print("Pour : ", test3['searchBar'],test1['searchBar'])
print(ex.comparaison(test3,test1,'searchBar'))
print("--------------")
print("Pour : ",test1["couleurDominante"],test2["couleurDominante"]," gris foncé, et gris légèrement plus clair")
print(ex.comparaisonHex(test1,test2,'couleurDominante'))
print("Pour : ",test1["couleurDominante"],test3["couleurDominante"]," gris foncé, gris très proche du blanc")
print(ex.comparaisonHex(test1,test3,'couleurDominante'))
print("--------------")
print("Pour : ",test3['paletteCouleurs'],test2['paletteCouleurs'])
print(ex.comparaisonHexList(test2['paletteCouleurs'],test3['paletteCouleurs']))
print("Pour : ",test2['paletteCouleurs'],test2['paletteCouleurs'])
print(ex.comparaisonHexList(test2['paletteCouleurs'],test2['paletteCouleurs']))
print("-----------")
print("Pour : ", test3["elementSize"],test1["elementSize"])
print(ex.comparaisonFloat(test3, test1, "elementSize"))
print("Pour : ", test4["elementSize"],test2["elementSize"])
print(ex.comparaisonFloat(test4, test2, "elementSize"))
print("-----------")
print("Pour : ", test3["nbElement"],test1["nbElement"])
print(ex.comparaisonFloat(test3, test1, "nbElement"))
print("Pour : ", test4["nbElement"],test2["nbElement"])
print(ex.comparaisonFloat(test4, test2, "nbElement"))
print("-----------------")
"""print("Pour : ",test3,test2)"""
print("score : ",ex.score(test3,test2))
