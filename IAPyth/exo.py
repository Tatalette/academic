import numpy as np
import pandas as pd
import seaborn as sns
import matplotlib as plt

DATA = pd.read_csv('Penguins.csv',delimiter=';')

#print(DATA.describe(include='all'))

#print(DATA[DATA["body_mass_g"].isna()])

#print(DATA.shape,'\n',DATA.columns,'\n',DATA.dtypes)

#print(DATA.select_dtypes(exclude='object').corr())

#print(DATA[DATA['body_mass_g']>6000])

DATA.dropna(inplace=True)

#print(DATA)

DATA['sex']=DATA['sex'].apply(lambda x : 0 if x=='male' else 1)

print(DATA)

sns.histplot(DATA['bill_length_mm'],kde=True, bins=30, color='red')

plt.show()