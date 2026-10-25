# IFCE — Projetos acadêmicos

Monorepo com os projetos desenvolvidos durante a graduação no IFCE. O histórico de commits de cada repositório original foi preservado.

## ⭐ TCC — Gestão financeira com IA

Trabalho de conclusão de curso: um sistema de controle financeiro pessoal com cadastro de transações e metas, e um bot de Telegram que registra gastos a partir de texto, fotos ou PDFs de comprovantes.

| Projeto | Descrição | Stack |
|---|---|---|
| [TCC/app](TCC/app) | Aplicação web (dashboard, transações, metas, API) | Laravel 10, Vue 3, Inertia, Tailwind, PostgreSQL, Docker |
| [TCC/bot](TCC/bot) | Bot de Telegram com OCR que consome a API do app | Python, python-telegram-bot, EasyOCR |

## Disciplinas

| Projeto | Disciplina | Descrição | Stack |
|---|---|---|---|
| [fundamentos-programacao](disciplinas/fundamentos-programacao) | Fundamentos de Programação | Sistema de pedidos de insumos (coordenador/secretário) | PHP, MySQL, AdminLTE |
| [javaweb](disciplinas/javaweb) | Java Web | Sistema acadêmico (notas) | Spring Boot, Thymeleaf, MySQL |
| [logica-computacao](disciplinas/logica-computacao) | Lógica para Computação | Satisfatibilidade proposicional (SAT) aplicada a diagnóstico de pacientes | Python, PySAT |
| [so-shell](disciplinas/so-shell) | Sistemas Operacionais | Interpretador de comandos (shell) próprio | C |
| [so-escalonamento](disciplinas/so-escalonamento) | Sistemas Operacionais | Escalonamento Round Robin e jantar dos filósofos | JavaScript, C (pthreads) |
| [computacao-grafica](disciplinas/computacao-grafica) | Computação Gráfica | Jogo de pênalti com campo em perspectiva 3D | HTML, CSS, JavaScript |
| [microcontroladores](disciplinas/microcontroladores) | Microcontroladores | Controle de acesso com ESP32 + RFID e API | C++ (PlatformIO), Laravel |
| [aps-projeto](disciplinas/aps-projeto) | Análise e Projeto de Software | App de finanças pessoais (API + mobile) | Laravel, React Native (Expo) |
| [compiladores](disciplinas/compiladores) | Compiladores | Compilador de linguagem própria para ESP32/Arduino | C, Flex, Bison |

## Estrutura

```
.
├── TCC/
│   ├── app/
│   └── bot/
└── disciplinas/
    ├── aps-projeto/
    ├── compiladores/
    ├── computacao-grafica/
    ├── fundamentos-programacao/
    ├── javaweb/
    ├── logica-computacao/
    ├── microcontroladores/
    ├── so-escalonamento/
    └── so-shell/
```

Cada projeto tem seu próprio README com instruções de execução.
