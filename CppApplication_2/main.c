/************ main.c ***************************/
#include "global.h"

int main(void)
{
	char ch;
	fs = fopen("source.txt", "r");
	if (fs == NULL)
	{
		puts("Cannot open source file");
		exit(0);
	}

	ft = fopen("out.txt", "w");
	if (ft == NULL)
	{
		puts("Cannot open target file");
		exit(0);
	}


	init();
	parse();
	fclose(ft);
	fclose(fs);
	exit(0);    /*  successful termination  */
}