from pwn import *

def calc(first, second, symbol):
	if symbol == '+':
		result = int(first) + int(second)	
	if symbol == '-':
		result = int(first) - int(second)	
	if symbol == '*':
		result = int(first) * int(second)	
	if symbol == '/':
		result = int(first) / int(second)	

	return result

def parse():
	print p.recvuntil('/1000)**')
	first_num = p.recvuntil(' ')
	symbol = p.recv(2)[:-1]
	second_num = p.recvuntil(' ')[:-1]
	result = calc(first_num, second_num, symbol)
	p.sendline(str(result))

if __name__ == "__main__":
	count = 0
	
	p = remote('ctf.skhudebug.xyz', 50001)	

	while count < 1000:
		count += 1
		parse()	

	p.interactive()
