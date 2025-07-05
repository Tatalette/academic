#include <stdio.h>
#include "util_rand.h"

#define MAX_FACE 6

void launch_dice(int *des, int nb_des) {
    for (int i = 0; i < nb_des; i++) {
        *(des + i) = rand_treshold_max(MAX_FACE);
    }
}

int doublon(int *des, int nb_des) {
    int reroll = 0;
    for (int i = 0; i < nb_des; i++) {
        for (int j = i + 1; j < nb_des; j++) {
            if (*(des + i) == *(des + j)) {
                *(des + j) = rand_treshold_max(MAX_FACE);
                reroll = 1;
            }
        }
    }
    return reroll;
}

int somme_des(int *des, int nb_des) {
    int somme = 0;
    for (int i = 0; i < nb_des; i++) {
        somme += *(des + i);
    }
    return somme;
}

void jouer() {
    int nb_des;
    printf("Combien de dé voulez-vous jouer ? Tapez 1, 2, 3 ou 4 : ");
    scanf("%d", &nb_des);
    if (nb_des < 1 || nb_des > 4) {
        printf("Nombre invalide.\n");
        return;
    }
    
    int des[4];
    printf("Vous avez choisi %d dé(s)\n", nb_des);
    
    lancer_des(des, nb_des);
    
    printf("Lancers initiaux :\n");
    for (int i = 0; i < nb_des; i++) {
        printf("Dé %d : %d\n", i, des[i]);
    }
    
    if (doublons(des, nb_des)) {
        printf("Dés identiques relancés...\n");
        for (int i = 0; i < nb_des; i++) {
            printf("Dé %d : %d\n", i, des[i]);
        }
    }
    
    int total = somme_des(des, nb_des);
    int seuil = (MAX_FACE * nb_des * 2) / 3; // Seuil des 2/3 du max possible
    
    printf("La somme des %d dés lancés est de %d, le seuil était de %d.\n", nb_des, total, seuil);
    
    if (total >= seuil) {
        printf("Bravo, vous avez gagné avec %d points au-dessus du seuil !\n", total - seuil);
    } else {
        printf("Désolé, vous avez perdu ! Il vous manquait %d points.\n", seuil - total);
    }
}

int main() {
    init_rand();
    jouer();
    return 0;
}
