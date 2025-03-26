#include <stdio.h>
#include "util_rand.h"

#define NB_TIRS 100000
#define MAX_VALEUR 5

void statistique_tirs() {
    int occurrences[MAX_VALEUR + 1] = {0};
    for (int i = 0; i < NB_TIRS; i++) {
        int valeur = rand_treshold_max(MAX_VALEUR);
        occurrences[valeur]++;
    }
    
    printf("Statistiques des tirages :\n");
    for (int i = 0; i <= MAX_VALEUR; i++) {
        double pourcentage = (double)occurrences[i] / NB_TIRS * 100;
        printf("Valeur %d : %d occurrences (%.2f%%)\n", i, occurrences[i], pourcentage);
    }
}

int main() {
    init_rand();
    statistique_tirs();
    return 0;
}
