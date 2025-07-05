#include <stdio.h>
int main(int argc, char const *argv[]){
    /*char C = 'a';
    int A = 256;
    int B = 129;
    printf("Adresse de c est %p \n",&C);
    printf("Code ascii du caractère a = %d \n",C);
    printf("Adresse de a est %p \n",&A);
    printf("Adresse de b est %p \n",&B);*/
    int *pt_int=NULL;
    *pt_int=10;
    printf("%p\n",pt_int);
    printf("%d\n",pt_int);
}