// gcc -o babybof babybof.c -fno-stack-protector
#include <stdio.h>
#include <unistd.h>
#include <stdlib.h>
#include <signal.h>

void _a()
{
	__asm("xor %rax, %rax");
	__asm("xor %rbx, %rax");
	__asm("xor %rdx, %rdx");
	__asm("ret");
}

void _b()
{
	__asm("pop %rbx");
	__asm("ret");
}

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


int main()
{
	initialize();

	char buf[200];
	read(0, buf, 500);

	return 0;
}
