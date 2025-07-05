#include <stdio.h>
int main(int argc, char const *argv[]){
    int *pt_int; // i pointeur sur entier
    int un_int = 5;
    printf("Valeur du pointeur pt_int à la déclaration %p\n", pt_int);
    //A la déclaration en C un pointeur il est recommandé de l'assigner à NULL
    pt_int= NULL;
    printf("Valeur du pointeur pt_int après assignation a NULL %p\n", pt_int);
    pt_int= &un_int; //Récupération de l'adresse mémoire de un_int
    printf("Vérification du fait que la val de pt_int %p et l'adresse de un_int %p sont les mêmes\n", pt_int, &un_int);
    printf("Vérification du fait que la val un_int %i et la valeur de l'objet pointé par pt_int %i sont les mêmes\n",un_int, *pt_int);
    //Modification de la valeur de un_inten passant par le pointeur
    *pt_int = 2;
    printf("Vérification du fait que la val de un_int %i et donc de l'objet pointé par pt_int %i ont bien été modifiés\n", un_int, *pt_int);
    return 0;
}