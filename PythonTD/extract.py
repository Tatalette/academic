import numpy as np

with open("Pix_herbacees.txt", "r") as f:
    lignes = f.readlines()
    
for ligne in lignes:
    print(len(ligne))
    
[7,6,32,62,18,31,31,27,27,28,13,24,29,
36,
34,
16,
28,
13,
23,
25,
49,
10,
20,
26,
26,
29,
26,
12,
10,
58]