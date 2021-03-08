#include <stdio.h>
#include <stdlib.h>
#include <signal.h>
#include <unistd.h>
#define MAX_LEN 1000

void print_image(FILE *fptr);

void alarm_handler() {
	puts("TIME OUT");
	exit(-1);
}

void initialize()
{
	setvbuf(stdin, NULL, _IONBF, 0);
	setvbuf(stdout, NULL, _IONBF, 0);
	signal(SIGALRM, alarm_handler);
	alarm(60);
}

int main()
{
	char *filename = "./ascii_art.txt";
	FILE *fptr = NULL;
	int n = 0;

	//initialize();

	if((fptr = fopen(filename,"r")) == NULL)
	{
	fprintf(stderr,"error opening %s\n",filename);
	return 1;
	}
	printf("1+1 = ?\n");
	scanf("%d", &n);

	if(n!=2){
		return 1;
	}
	print_image(fptr);

	fclose(fptr);

	printf("\n\n");
	printf("debugCTF{Y0U_WI11_B3_G00D_H@CK3R}\n");
	return 0;
}

void print_image(FILE *fptr)
{
    char read_string[MAX_LEN];

    while(fgets(read_string,sizeof(read_string),fptr) != NULL)
        printf("%s",read_string);
}
