# Fundamentos de Programação — Sistema de pedidos de insumos

Sistema web para gerenciar insumos e pedidos, com dois perfis:

- **Secretário:** cadastra, edita e lista insumos; acompanha pedidos.
- **Coordenador:** consulta insumos, solicita insumos e lista seus pedidos.

**Stack:** API em PHP (PDO/MySQL) e cliente em HTML/jQuery com template AdminLTE (Bootstrap 4).

## Como executar

Requisitos: PHP 7.4+ (com Apache — a API usa `apache_request_headers()`) e MySQL.

1. Crie o banco `dwr` no MySQL e as tabelas de usuários, insumos e pedidos (o repositório não inclui script SQL).
2. Ajuste host, usuário e senha em `api/models/Conexao.class.php` (padrão: `mysql:host=localhost;dbname=dwr`).
3. Publique as pastas no Apache (ex.: em `/var/www/html/`):

   ```bash
   sudo cp -r disciplinas/fundamentos-programacao/api /var/www/html/api
   sudo cp -r disciplinas/fundamentos-programacao/client /var/www/html/client
   ```

4. Acesse `http://localhost/client/pages/index.html`. Se a URL base da API no frontend for diferente, ajuste os arquivos em `client/pages/` e `client/assets`.

## Estrutura

- `api/` — `index.php` (roteador), `auth.php`, `controllers/` e `models/`
- `client/` — páginas `coordenador/` e `secretario/` e assets do AdminLTE
