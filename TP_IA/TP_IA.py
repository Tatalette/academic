import numpy as np
import scipy as si
import matplotlib
import matplotlib.pyplot as plt
import pandas as pd
import statsmodels as stm
from sklearn.datasets import fetch_openml
from sklearn.linear_model import SGDClassifier
from sklearn.model_selection import cross_val_score
from sklearn.base import BaseEstimator
from sklearn.model_selection import cross_val_predict
from sklearn.metrics import confusion_matrix
from sklearn.metrics import precision_score
from sklearn.metrics import recall_score
from sklearn.multiclass import OneVsOneClassifier
from sklearn.ensemble import RandomForestClassifier

mnist = fetch_openml('mnist_784')

#forçage de la transformation des données en entiers sinon erreur lors de l'entrainement plus tard avec astype(np.uint8)
x,y = mnist["data"],mnist["target"].astype(np.uint8) 

#conversion du DataFrame pandas en numpy array
x,y = x.to_numpy(), y.to_numpy()

print("Taille de x : ",x.shape,"\n taille de y : ",y.shape)

"""Question 1 : """

some_digit = x[3613]
some_digit_image = some_digit.reshape(28,28)


print("valeur de y[36000] : ",y[36000])

"""Question 2 : """

x_train, x_test, y_train, y_test = x[:60000], x[60000:], y[:60000], y[60000:]
shuffle_index = np.random.permutation(60000)
print("x_train avant permutation : ",x_train,"\n y_train avant permutation : ",y_train)
x_train,y_train = x_train[shuffle_index], y_train[shuffle_index]
print("--------------------------------")
print("x_train après permutation : ",x_train,"\n y_train après permutation : ",y_train)

"""Question 3 : """

y_train_5 = (y_train == 5)
y_test_5 = (y_test == 5)

sgd_clf = SGDClassifier(random_state=42)
sgd_clf.fit(x_train, y_train_5)

print("--------------------------------")

prediction = sgd_clf.predict([some_digit])
print("La prédiction est : ",prediction)

"""Question 4 : """

scores = cross_val_score(sgd_clf, x_train, y_train_5, cv=3, scoring="accuracy")
print("Les scores de cross-validation sont : ",scores)

"""Question 4.2 : """

class Never5Classifier(BaseEstimator):
    def fit(self, X, y=None):
        pass
    def predict(self, X):
        return np.zeros((len(X), 1), dtype=bool)
    
never_5_clf = Never5Classifier()
print(cross_val_score(never_5_clf, x_train, y_train_5, cv=3, scoring="accuracy"))

"""Question 5 : """

y_train_pred = cross_val_predict(sgd_clf, x_train, y_train_5, cv=3)
resultat = confusion_matrix(y_train_5, y_train_pred)
print("Résultat du confusion_matrix : ",resultat)

"""Question 5.1 : """
precision = precision_score(y_train_5, y_train_pred)
recall =  recall_score(y_train_5, y_train_pred)
print("Précision : ",precision)
print("Rappel : ",recall)

"""Question 6 : """
print("###-------SGD multi classe-------###")
""" 6.1 """

sgd_clf.fit(x_train, y_train)
prediction_mult = sgd_clf.predict([some_digit])
print("La prédiction multiclasse est de : ",prediction_mult)

""" 6.2 """

ovo_clf = OneVsOneClassifier(SGDClassifier(random_state=42))
ovo_clf.fit(x_train, y_train)
prediction_ovo = ovo_clf.predict([some_digit])

print("La prédiction OVO est de : ",prediction_ovo)
print("Nombre de classifieurs binaires entraînés (OvO) : ", len(ovo_clf.estimators_))

""" 6.3 """

forest_clf = RandomForestClassifier(random_state=42)
forest_clf.fit(x_train, y_train)
forest_prediction = forest_clf.predict([some_digit])
print("La prédiction Random Forest est de : ",forest_prediction)
forest_proba = forest_clf.predict_proba([some_digit])
print("Probabilité de chaque classe : ",forest_proba)

""" 6.4 """

forest_prec = cross_val_score(forest_clf, x_train, y_train, cv=3, scoring="accuracy")
print("Précision de la forêt aléatoire : ",forest_prec)

""" Show image mathplotlib"""
plt.imshow(some_digit_image, cmap = matplotlib.cm.binary, interpolation="nearest")
plt.axis("off")
plt.show()


print("end of test")