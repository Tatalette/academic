/* La liste chaînée semble être le choix le plus judicieux.
L'utilisation d'un tableau demande d'allouer dynamiquement ou bien statiquement une allocation mémoire,
ce qui limite de part l'allocation la taille du tableau.
Avec une liste chaînée, on peut élever autant que l'on peut au niveau du buffer la longueur de la structure

Dans tout les cas, si la pile est vide, rien ne pourra être retirée

L'utilisation d'une double chaine est trop couteuse et inutile pour ce que l'on veut faire.
On ne manipule que la fin de la liste.

L'idée donc est de créer sa structure, avec un pointeur dans le champ de structure
(c'est le principe de la liste chaînée), ainsi on pourra 
*/

#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h> 

typedef struct maillon_pile
{
    int val;
    struct maillon_pile *ajout;
}pile;

bool test_pile_empty(pile *pile_test){
    //Simple test
    bool b = false;
    if(pile_test==NULL){
        printf("La pile est vide !");
        b = true;
    }
    else{
        printf("la pile existe");
    }
    return b;
}

pile *ajout_last_elt(pile *pile_actuel, int elt){
    //On créer d'abord une nouvelle structure pile
    pile *new_elt = malloc(sizeof(pile));
    //Ensuite on ajoute la valeur voulue dans son premier champ qui est un int
    new_elt->val=elt;
    //Et enfin on indique que son pointneur est null vu qu'il est en bout de chaîne
    new_elt->ajout=NULL;
    //Puis on oublie pas d'ajouter que le pointeur de l'entête précédente
    //En parcourant la pile
    while(pile_actuel!=NULL){
        pile_actuel=pile_actuel->ajout;
    }
    pile_actuel->ajout=new_elt;
}

pile *retirer_last_elt(pile *pile){
    while(pile!=NULL){
        pile = pile->ajout;
    }
    free(pile);
}

pile *reverse_pile(pile *pile_a_retourner){
    pile *pile_rev = malloc(sizeof(pile_a_retourner));
    while(test_pile_empty==false){
        ajout_last_elt(pile_rev,pile_a_retourner->val);
        retirer_last_elt(pile_a_retourner);
    }
}

int main(){
    pile * p1= NULL;
    for(int i=0; i<7;i++){
        ajout_last_elt(p1,i);
    }
    retirer_last_elt(p1);
    pile * p2 = reverse_pile(p1);
}