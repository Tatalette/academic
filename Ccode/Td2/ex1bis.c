#include <stdlib.h>
#include <stdio.h>
#include <time.h>

int random_number(){
    srand(time(NULL));
    return rand();
}

int rand_treshold_max(int treshold){
    srand(time(NULL));
    return rand() % treshold+1;
}

int rand_treshold(int treshmin, int treshmax){
    srand(time(NULL));
    if(treshmin<treshmax){
        return rand() % (treshmax+1) + treshmin;
    }else{
        return rand() % (treshmin+1) + treshmax;
    }
}

float rand_float(){
    srand(time(NULL));
    float rand_nb = (float)rand()/(float)RAND_MAX;
}

float rand_float_all(int treshmin, int treshmax){
    srand(time(NULL));
    if(treshmin < treshmax){
        return rand() % (treshmax+1) + treshmin + (rand_treshold_max(99)*0,01);
    }else{
        return treshmax + (float)rand()/((float)RAND_MAX/(treshmin-treshmax));
    }
    
}

#ifndef __UTIL_RAND_H__
#define __UTIL_RAND_H__

int random_number();
int rand_treshold_max(int v);
int rand_treshold(int v1,int v2);
float rand_float();
float rand_float_all(int v1,int v2);

#endif