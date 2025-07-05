#include <stdio.h>

int main(){
    int a = 10;
    int b = 20;

    int * pt_a = &a;
    int * pt_b = &b;
    void * pt_temp = NULL;
    printf("Les deux entiers au départ %d et %d\n",a,b);

    pt_temp = (int*)malloc(sizeof(int));
    if(pt_temp == NULL) return 1;
    *(int*)pt_temp = *pt_a;
    *(int*)pt_a = *pt_b;
    *(int*)pt_b = *(int*)pt_temp;
    free(pt_temp);
    printf("la valeur de a est : %d, la valeur de b est : %d",a,b);
    return 0;
}
