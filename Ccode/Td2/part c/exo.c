int fact_c(int n) {
    if (n <= 1) {
        return 1;
    }else{
        return n * fact_c(n - 1);
    }
}

int fact_t(int n, int accu) {
    if (n <= 1){
        return accu;
    } else{
        return fact_t(n - 1, n * accu);
    }
}

int puiss_c(int n, int puiss) {
    if (puiss == 0){
        return 1;
    }else{
        return n * puiss_c(n, puiss - 1);
    }
}


int puiss_t(int n, int puiss, int accu) {
    if (puiss == 0){
        return accu;
    }else{
        return puiss_t(n, puiss - 1, n * accu);
    }
}

int main(){
    int fc = fact_c(10);
    int ft = fact_t(10,1);
    printf("Factorielle classique de 10 : %d\n", fc);
    printf("Factorielle terminale de 10 : %d\n", ft);
    printf("Puissance classique 2^7 : %d\n", puiss_c(2, 7));
    printf("Puissance terminale 2^7 : %d\n", puiss_t(2, 7, 1));
}