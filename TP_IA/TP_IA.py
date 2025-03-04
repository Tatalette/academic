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

""" Show image mathplotlib"""
plt.imshow(some_digit_image, cmap = matplotlib.cm.binary, interpolation="nearest")
plt.axis("off")
plt.show()

print("end of test")