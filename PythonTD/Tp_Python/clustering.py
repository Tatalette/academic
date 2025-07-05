import pandas as pd
import numpy as np
import matplotlib as plt
from sklearn import datasets

"""iris = datasets.load_iris()
feature_names = iris.feature_names
target_names = iris."""

df = pd.read_csv('C:\VSCode\PythonTD\Tp_Python\Marketing.csv')
#La taille du dataframe est de 2240 lignes pour 20 colonnes.
"""df.info()"""
#ou
print("La taille des colonnes sont : ",df.shape,"\n les features sont : ",df.dtypes)

print("Valeurs manquantes avant suppression : ",df.isna().sum())
df = df.dropna()
print("\nValeurs manquantes après suppression : ",df.isna().sum())

print("#---------------------------------------------#")
print("Df avant modification :\n",df["Duration"],df["Duration"].dtypes)

df["Duration"] = pd.to_datetime(df["Duration"])

print("\nDf après modification : \n",df['Duration'],df["Duration"].dtypes)

min_date = df["Duration"].min()
df['Duration']=df['Duration'].apply(lambda x: (x -min_date).days)
