# TCC — Bot de Telegram

Bot de Telegram que se conecta à API do [App Financeiro](../app) para registrar transações. Aceita mensagens de texto, imagens e PDFs de comprovantes (extraídos com OCR via EasyOCR).

**Stack:** Python 3, python-telegram-bot, EasyOCR, PyMuPDF/pdf2image, OpenAI.

## Como executar

Requisitos: Python 3.10+, um bot criado no [@BotFather](https://t.me/BotFather) e o App Financeiro em execução. Para ler PDFs com `pdf2image` é necessário o `poppler-utils` (`sudo apt install poppler-utils`).

```bash
cd TCC/bot
python -m venv .venv && source .venv/bin/activate
pip install -r requirements.txt
```

Crie um arquivo `.env` na pasta do bot:

```env
TELEGRAM_BOT_TOKEN=<token do BotFather>
APP_BASE_URL=http://localhost:8001
```

(`APP_BASE_URL` é a URL do app; o bot usa `APP_BASE_URL/api`.) Timeouts do Telegram podem ser ajustados com `TELEGRAM_CONNECT_TIMEOUT`, `TELEGRAM_READ_TIMEOUT`, `TELEGRAM_WRITE_TIMEOUT` e `TELEGRAM_POOL_TIMEOUT`.

```bash
python main.py
```

Na primeira execução o EasyOCR baixa os modelos de linguagem (pt/en).

## Estrutura

- `main.py` — inicialização e handlers
- `controllers/` — lógica dos comandos do bot
- `services/` — usuário, transações e OCR
- `apis/` — clientes HTTP da API do app
- `messages/` — textos das respostas
