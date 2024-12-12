# -*- coding: utf-8 -*-
"""
Created on Thu Dec 12 11:31:14 2024

@author: PC
"""
import json

with open('test.json') as f:
    d = json.load(f)
    print(d)
    
for key in d:
    print(key.value())