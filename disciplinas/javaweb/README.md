# Java Web — Sistema Acadêmico

Aplicação web acadêmica (gestão de notas) com Spring Boot, JPA/Hibernate e templates Thymeleaf, usando o tema SB Admin 2.

**Stack:** Java 17, Spring Boot 2.7.5, Thymeleaf, MySQL, Maven.

## Como executar

Requisitos: JDK 17 e MySQL em execução em `localhost:3306`.

1. Confira usuário e senha do banco em `academico/src/main/resources/application.properties` (padrão: `root` / `123456`). O banco `academico` e as tabelas são criados automaticamente.
2. Rode a aplicação:

   ```bash
   cd disciplinas/javaweb/academico
   ./mvnw spring-boot:run
   ```

3. Acesse http://localhost:8080.
