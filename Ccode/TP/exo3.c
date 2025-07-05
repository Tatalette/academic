/* Après avoir lu l'exercice,pour l'implémentation voici mon choix :
On fait un tableau dynamique de structure, ainsi pour avoir les données d'un train, on aura tout ces champs
de différents type. Comme le tableau ne peut contenir qu'un type de donnée, ce type de donnée sera
la structure qui elle contiendra différents type de données
En ce qui concerne le tableau, il faudra réallouer la mémoire à chaque fois sur la taille de la structure ajoutée ou supprimée*/
#include <time.h>
#include <stdio.h>
#include <stdlib.h>

typedef struct train
{
    char * ville_d;
    char * ville_a;
    struct tm *heure_d;
    struct tm *heure_a;
    int dist;
}train;

void ajouter_horaire(train *train_ajout,train tab){
    int size = sizeof(tab)+ sizeof(train);
    void *p_tab = &tab;
    tab = realloc(*p_tab,size);
    i = sizeof(tab)-1;
    tab[i]=train_ajout;
}

void afficher_train_ville(train tab_train, char ville){
    int taille = sizeof(tab_train)/sizeof(tab_train[0]);
    for(int i=0; i<taille;i++){
        if(tab_train[i->ville_d]==ville){
            printf("%c",tab_train[i->ville]);
        }
    }
}

int conversion(int heure){
    return heure*60;
}

long vitesse_moyenne(train *horaire, int distance){
    int temps = NULL;
    long avg_time = NULL;
    struct tm depart_min = horaire->heure_d;
    struct tm arrive_min = horaire->heure_a;
    int dep_min = depart_min -> tm_min;
    int dep_h = depart_min -> tm_hour;
    int arr_min = arrive_min -> tm_min;
    int arr_h = arrive_min -> tm_hour;
    dep_min += conversion(dep_h);
    arr_min += conversion(arr_h);
    temps = arr_min - dep_min;
    avg_time = distance/temps;
    return avg_time;
}

train best_avg_speed(train tab_train){
    long best = vitesse_moyenne(tab_train[0]);
    int indice = 0;
    int taille = sizeof(tab_train)/sizeof(tab_train[0]);
    if(taille>1){
        for(int i=1;i<taille;i++){
            if(vitesse_moyenne(tab_train[i]<){
                best = vitesse_moyenne(tab_train[0]);
                indice = i;
            }
        }
    }
    return tab_train[indice];
}


int main(){
    char v1 = 'Paris';
    char v2 = 'Toulouse';
    char v3 = 'Marseille';
    char v4 = 'Brest';
    struct tm h1 = {NULL,40,7,NULL,NULL,NULL,NULL,NULL,NULL};
    struct tm h2 = {NULL,50,13,NULL,NULL,NULL,NULL,NULL,NULL};
    struct tm h3 = {NULL,40,6,NULL,NULL,NULL,NULL,NULL,NULL};
    struct train train1 = {v1,v2,h1,h2,int 300};
    struct train train2 = {v3,v4,h3,h2,int 400};
    train * tab = [&train1,&train2];
    train res = best_avg_speed(tab);
    printf('%c',res);
}