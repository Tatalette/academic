#include <stdio.h>
#include <stdlib.h>

int swap(void *pt_a, void *pt_b){
    void *pt_temp = NULL;
    if(pt_temp == NULL) return 1;
    *pt_temp = *pt_a;
    *pt_a = *pt_b;
    *pt_b = *pt_b;
    free(pt_temp);
    return 0;
}

int main(){
    int a = 10;
    int b = 20;
    printf("Les deux entiers au départ %d et %d\n",a,b);
    int *pt_a = &a;
    int *pt_b = &b;
    swap(pt_a, pt_b);
    printf("La valeur de a est : %d, la valeur de b est : %d\n",a,b);
    return 0;
}