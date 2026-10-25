# Sistemas Operacionais — Escalonamento e comunicação entre processos

Trabalho 2 da disciplina de Sistemas Operacionais.

- **Questão 01 (`questao01.js`)** — simulação do escalonador **Round Robin** (quantum = 4): tempo médio de espera, de retorno, tempo total de execução, trocas de contexto e vazão em 10, 15 e 20 unidades de tempo.
- **Questão 02 (`questao02.c`)** — **jantar dos filósofos** com threads POSIX e mutexes (5 filósofos, 1000 execuções).

## Como executar

```bash
cd disciplinas/so-escalonamento

# Questão 01 (Node.js)
node questao01.js

# Questão 02 (gcc + pthreads)
gcc questao02.c -o questao02 -lpthread
./questao02
```
