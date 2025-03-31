import sklearn as skl
import pandas as pd
import math
from sklearn import datasets

iris = datasets.load_iris()
feature_names = iris.feature_names
target_names = iris.target_names

df = pd.DataFrame(data=iris.data, columns=feature_names)

print(df)