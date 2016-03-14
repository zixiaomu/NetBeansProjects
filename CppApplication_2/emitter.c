/**************   emitter.c ********************/
#include "global.h"
void emit(int t, int tval)  /*  generates output  */
{
	switch (t) {
	case '+': case '-': case '*': case '/':
		fprintf(ft, "%c\n", t); break;
	case '=':
		fprintf(ft, "=n"); break;
	case PLUS:
		fprintf(ft, "PLUS\n"); break;
	case MINUS:
		fprintf(ft, "MINUS\n"); break;

	case DIV:
		fprintf(ft, "DIV\n"); break;
	case MOD:
		fprintf(ft, "MOD\n"); break;
	case NUM:
		fprintf(ft, "%d\n", tval); break;
	case ID:
		fprintf(ft, "%s\n", symtable[tval].lexptr); break;
	default:
		fprintf(ft, "token %d, tokenval %d\n", t, tval);
	}
}