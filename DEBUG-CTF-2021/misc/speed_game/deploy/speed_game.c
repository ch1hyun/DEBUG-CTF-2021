#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <signal.h>

int count = 0;

void alarm_handler() {
	puts("TIME OUT");
	exit(-1);
}

void initialize()
{
	setvbuf(stdin, NULL, _IONBF, 0);
	setvbuf(stdout, NULL, _IONBF, 0);
	signal(SIGALRM, alarm_handler);
	alarm(120);
}

void banner()
{
	printf("================================\n");
	printf("================================\n");
	printf("==========SPEED GAME============\n");
	printf("================================\n");
	printf("================================\n\n");
	printf("지금부터 사칙연산게임을 시작합니다.\n");
	printf("총 1000번의 연산게임을 60초 이내로 모두 맞추면 FLAG를 드립니다. 그럼 화이팅!\n\n");
}

int speed_game()
{
	int answer;
	int result;
	srand((unsigned int)time(NULL));
	int first_num = rand() % 100;
	int second_num = rand() % 100;
	
	printf("\n**사칙연산게임 (%d/1000)**\n", count+1);
	
	if((first_num>=second_num ? 1:0))
	{
		switch((rand() % 2)+1)
		{
			case 1:
				result = first_num - second_num;
				printf("%d - %d = ?\n", first_num, second_num);
				break;
			case 2:
				result = first_num / second_num;
				printf("%d / %d = ?\n", first_num, second_num);
				break;
		}
	}
	else
	{
		switch((rand() % 2)+1)
		{
			case 1:
				result = first_num + second_num;
				printf("%d + %d = ?\n", first_num, second_num);
				break;
			case 2:
				result = first_num * second_num;
				printf("%d * %d = ?\n", first_num, second_num);
				break;
		}
	}
	scanf("%d", &answer);
	
	if(answer == result)
		return 0;
	else
		return 1;
}

int main()
{
	initialize();
	char *flag = {"debugCTF{U_R_A_MAST3R_0F_ARITHMETIC}"};
	banner();
	do{
		if(!speed_game())
		{
			printf("정답! 다음단계로 넘어갑니다!\n");
		}
		else
		{
			printf("계산 연습이 더 필요하겠네요!\n");
			exit(-1);
		}

		count++;
	}while(count<1000);

	printf("\n축하합니다!!\n");
	printf("\n플래그를 드리겠습니다.\n");
	printf("플래그 : %s\n", flag);

	return 0;
}
