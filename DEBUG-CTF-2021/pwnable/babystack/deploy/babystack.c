// gcc -o babystack babystack.c -fno-stack-protector
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <signal.h>

void alarm_handler() {
	puts("TIME OUT");
	exit(-1);
}


void initialize() {
	setvbuf(stdin, NULL, _IONBF, 0);
	setvbuf(stdout, NULL, _IONBF, 0);

	signal(SIGALRM, alarm_handler);
	alarm(30);
}

void get_shell()
{
	system("/bin/sh");
}

int main()
{
	initialize();
	char buf[100];

	printf("stack overflow challenge!\n");
	printf("give me a payload : ");
	fflush(stdout);
	read(0, buf, 200);
	
	return 0;
}
