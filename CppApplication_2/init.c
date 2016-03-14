/************ init.c ***************************/
#include "global.h"

struct entry keywords[] = {
	{ "div", DIV },
	{ "mod", MOD, },
	{ "plus", PLUS },
	{ "minus", MINUS },
	{ 0, 0 }
};

void init() 
{
	struct entry *p;
	for (p = keywords; p->token; p++)
		insert(p->lexptr, p->token);
}