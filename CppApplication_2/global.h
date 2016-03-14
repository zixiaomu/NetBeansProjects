//
//  Header.h
//  pj2
//
//  Created by Yugeng Chang on 6/1/15.
//  Copyright (c) 2015 Yugeng Chang. All rights reserved.
//
#ifndef GLOBAL_H
#define GLOBAL_H
#include <stdio.h> 
#include <ctype.h>  
#include <stdlib.h> 
#include <string.h> 

#define BSIZE  128  /* buffer size */
#define NONE   -1
#define EOS    '\0'

#define NUM    256
#define DIV    257
#define MOD    258
#define ID     259
#define DONE   260
#define PLUS   243
#define MINUS  255


int	tokenval ;	/* value of token attribute */
int lineno;
FILE *fs, *ft;

/* form of symbol table entry */
struct  entry
{
    char  *lexptr;
    int     token;
};
struct entry symtable[];
void init();
void error(char* m);
int lexan();
void parse();
int insert(char *s, int tok);
int lookup(char *s);
void emit(int t, int tval);

#endif