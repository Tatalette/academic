import json
import numpy as np



def extractData(jFile)->list:
    with open(jFile) as f:
        d = json.load(f)
        print(d)
    return d

def putDataList(fileOpen:dict):
    global typeMenuList, typeSiteList, colorList, contrastList, scrollList
    global nbElementList, elementSize, searchBarList 
    for choice in fileOpen.items():
        typeMenuList = np.append(choice["typeMenu"])
        typeSiteList = np.append(choice["typeSite"])
        colorList = np.append(choice["color"])
        contrastList = np.append(choice["contrast"])
        scrollList = np.append(choice["scroll"])
        nbElementList = np.append(choice["nbElement"])
        elementSizeList = np.append(choice["elementSize"])
        searchBarList = np.append(choice["searchBar"])
        
            
        
    
def Main():
    """
    Returns
    -------
    None.
    """
    extractData('test.json')
    dictData