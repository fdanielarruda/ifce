# Compiladores — Compilador personalizado

Compilador de uma linguagem própria (em português) voltada à configuração de microcontroladores tipo ESP32/Arduino (variáveis, `config`, pinos, PWM etc.). Usa **Flex** para análise léxica e **Bison** para análise sintática.

## Como executar

Requisitos (Ubuntu/Debian):

```bash
sudo apt install flex bison gcc -y
```

Compilar e executar um programa de exemplo:

```bash
cd disciplinas/compiladores
./build.sh
./compiler langs/example1.lang
```

Se necessário, `chmod +x build.sh compiler`.

## Estrutura

- `src/lexer.l` — tokens (Flex)
- `src/parser.y` — gramática e geração de código (Bison)
- `temp/` — código C gerado
- `langs/` — exemplos na linguagem personalizada
- `build.sh` — gera lexer/parser e compila o executável `compiler`

Documentação: [Flex](https://westes.github.io/flex/manual/) · [Bison](https://www.gnu.org/software/bison/manual/)
