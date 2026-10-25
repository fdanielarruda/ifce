# TCC — App Financeiro

Aplicação web de controle financeiro pessoal: dashboard, cadastro de transações (manual ou por IA), categorias e metas. Também expõe a API consumida pelo [bot de Telegram](../bot).

**Stack:** Laravel 10 (PHP 8.1+), Vue 3 + Inertia + TypeScript, Tailwind, Vite, PostgreSQL 17, Docker (nginx, php-fpm, node).

## Como executar (Docker)

Requisitos: Docker e Docker Compose.

```bash
cd TCC/app
cp .env.example .env
```

Edite o `.env` e preencha ao menos `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` e `DB_EXTERNAL_PORT` (ex.: `5433`). `DB_HOST` deve continuar `db`.

```bash
docker compose up -d --build
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

- App: http://localhost:8001 (porta definida por `APP_PORT`)
- Vite (hot reload): porta 5173 — o container `node` roda `npm install && npm run dev` automaticamente.

## Testes

```bash
docker compose exec app php artisan test
```

## Estrutura

- `app/`, `routes/` — backend Laravel (rotas web em `web.php`, API em `api.php`)
- `resources/js/` — frontend Vue/Inertia
- `docker/` — Dockerfiles e configuração do nginx
