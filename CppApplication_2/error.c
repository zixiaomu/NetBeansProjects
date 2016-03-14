/******* error.c **************/
#include "global.h"

void error(char* m) 

{
	fprintf(stderr, "line %d: %s\n", lineno, m);
        printf("\n*****%d line number ",lineno);
	exit(EXIT_FAILURE); 
}