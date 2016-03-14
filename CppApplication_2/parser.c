/**************   parser.c ********************/
#include "global.h"
int lookahead;

void match(int);
void list(), expr(), terms_2(), term(), factors_2(), factor();

void parse()  /*  parses and translates expression list  */
{
    while(lookahead != DONE)
    {
        emit(ID,tokenval);match(ID);match("=");expr();emit('=',DONE);match(';');
    }
	lookahead = lexan();
	list(); match(DONE);
}


void list()
{
	if (lookahead == '(' || lookahead == ID || lookahead == NUM || lookahead == '=' ) {
		expr(); match(';'); list();
	}
	else {
	
	
		/* Empty */
		
	}
		
}

void expr()
{
	
	term(); terms_2();
}

void terms_2()
{
	if (lookahead == '+') {
		match('+'); term(); emit('+', tokenval); terms_2();
	}
	else if (lookahead == '-') {
		match('-'); term(); emit('-', tokenval); terms_2();
	}
	else {
		
		
	}
}

void term()
{
	/* Just one production for term, so we don't need to check lookahead */
	factor(); factors_2();
}

void factors_2()
{
	if (lookahead == '*') {
		match('*'); factor(); emit('*', tokenval); factors_2();
	}
	else if (lookahead == '/') {
		match('/'); factor(); emit('/', tokenval); factors_2();
	}
	else if (lookahead == PLUS) {
		match(PLUS); factor(); emit(PLUS, tokenval); factors_2();
	}
	else if (lookahead == MINUS) {
		match(MINUS); factor(); emit(MINUS, tokenval); factors_2();
	}
	else if (lookahead == DIV) {
		match(DIV); factor(); emit(DIV, tokenval); factors_2();
	}
	else if (lookahead == MOD) {
		match(MOD); factor(); emit(MOD, tokenval); factors_2();
	}
	else {
		/* Empty */
	}
}

void factor()
{
	if (lookahead == '(') {
		match('('); expr(); match(')');
	}
	else if (lookahead == ID) {
		int id_lexeme = tokenval;
		match(ID);
		emit(ID, id_lexeme);
	}
	else if (lookahead == NUM) {
		int num_value = tokenval;
		match(NUM);
		emit(NUM, num_value);
	}
	else
		error("syntax error in factor");
}

void match(int t)
{
	if (lookahead == t)
		lookahead = lexan();
	else
		error("syntax error in match");
}