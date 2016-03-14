/***************  lexer.c ************************/
#include "global.h"
 char lexbuf[BSIZE];


    int lexan ()  /*  lexical analyzer  */
    {

      int t;
	  int p, b = 0;

      while(1) {
        t = fgetc (fs);
        if (t == ' ' || t == '\t')
          ;  /*  strip out white space  */
        else if (t == '\n')
          lineno = lineno + 1;
        else if (isdigit (t)) {  /*  t is a digit  */
          ungetc(t, fs);
          fscanf(fs,"%d", &tokenval);
          return NUM;
        }
        else if (isalpha(t)) {  /*  t is a letter */
          while (isalnum(t)) {  /* t is alphanumeric  */
            lexbuf [b] = t; 
            t = fgetchar (fs);
            b = b + 1;
            if (b >= BSIZE)
              error("compiler error");
          }
          lexbuf[b] = EOS;
          if (t != EOF)
            ungetc(t, fs);
          p = lookup (lexbuf);
          if (p == 0)
            p = insert (lexbuf, ID);
          tokenval = p;
          return symtable[p].token;
        }
        else if (t == EOF)
          return DONE;
        else {
          tokenval = NONE;
          return t;
        }
      }
    }