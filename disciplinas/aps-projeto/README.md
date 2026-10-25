# APS — App de finanças pessoais

Projeto da disciplina de Análise e Projeto de Software: um app de controle de transações e metas financeiras, dividido em API e aplicativo mobile.

- `api/` — API em Laravel (usuários, transações, metas e aportes em metas). SQLite por padrão.
- `mobile/` — aplicativo React Native (Expo 51) com NativeWind e React Navigation.

## Como executar

### API

Requisitos: PHP 8.2+, Composer.

```bash
cd disciplinas/aps-projeto/api
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan serve --host=0.0.0.0
```

### Mobile

Requisitos: Node.js 18+ e o app Expo Go (ou emulador).

```bash
cd disciplinas/aps-projeto/mobile
npm install
```

Crie um `.env` com a URL da API (lida via `@env`):

```env
REACT_API_URL=http://<ip-da-sua-maquina>:8000/api
```

```bash
npm start        # ou npm run android / npm run web
```

Para gerar o APK: `eas build -p android --profile preview`.
