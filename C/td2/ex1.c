#include <stdlib.h>
#include <stdio.h>
#include <time.h>

void random_number(){
    int rand_nb = rand();
    printf("Valeur aléatoire sur la plage maximal : %d\n",rand_nb);
}

void rand_treshold_max(int treshold){
    int rand_nb = rand() % treshold+1;
    printf("Valeur aléatoire avec seuil à %d est : %d\n",treshold,rand_nb);
}

void rand_treshold(int treshmin, int treshmax){
    if(treshmin<treshmax){
        int rand_nb = rand() % (treshmax+1) + treshmin;
        printf("Valeur aléatoire générée avec seuil min à %d et seuil max à %d : %d\n",treshmin,treshmax,rand_nb);
    }else{
        int rand_nb = rand() % (treshmin+1) + treshmin;
        rand_nb += treshmax;
        printf("Valeur aléatoire générée avec seuil min à %d et seuil max à %d : %d\n");
    }
}

void rand_float(){
    float rand_nb = (float)rand()/(float)RAND_MAX;
    printf("Valeur réel entre 0 et 1 : %f\n",rand_nb);
}

void rand_float_all(int treshmin, int treshmax){
    if(treshmin < treshmax){
        float rand_nb = treshmin + (float)rand()/((float)RAND_MAX/(treshmax-treshmin));
        printf("Valeur réel entre le seuil %d et %d est de : %.2f\n",treshmin,treshmax,rand_nb);
    }else{
        float rand_nb = treshmax + (float)rand()/((float)RAND_MAX/(treshmin-treshmax));
        printf("Valeur réel entre le seuil %d et %d est de : %.2f\n",treshmin,treshmax,rand_nb);
    }
    
}

int main(){
    srand(time(NULL));
    void srand(unsigned int seed);
    random_number();
    rand_treshold_max(100);
    rand_treshold(23,67);
    rand_float();
    rand_float_all(40,53);
    return EXIT_SUCCESS;
}

#ifndef __UTILSWAP_H__
#define __UTILSWAP_H__



#endif