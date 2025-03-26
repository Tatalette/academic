#include <stdio.h>
int main(int argc, char const *argv[]){
    int *pt_int = NULL;
    pt_int = (int *) malloc(sizeof(int));
    printf("%p\n",pt_int);
    *pt_int = 20;
    printf("%i\n",*pt_int);
    free(pt_int);
    return 0;
}