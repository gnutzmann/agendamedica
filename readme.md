# Agenda Médica

Agenda Médica é uma aplicação web desenvolvida em Laravel para gerenciar consultas médicas, pacientes, médicos e agendamentos. O sistema permite que médicos e pacientes interajam de forma eficiente, com funcionalidades específicas para cada perfil.

## Funcionalidades

- **Autenticação**:

  - Login e registro de usuários.
  - Diferenciação entre perfis de médicos e pacientes.

- **Gerenciamento de Médicos**:

  - Cadastro e gerenciamento de especialidades médicas.
  - Compartilhamento de informações de pacientes entre médicos.

- **Gerenciamento de Pacientes**:

  - Cadastro e edição de informações de pacientes.
  - Visualização de consultas agendadas.

- **Agendamento de Consultas**:

  - Criação, edição e cancelamento de consultas.
  - Controle de disponibilidade de horários.

- **Sistema de Permissões**:
  - Controle de acesso baseado em perfis (médico ou paciente).

## Tecnologias Utilizadas

- **Backend**: Laravel 10
- **Frontend**: Blade Templates, Bootstrap 5
- **Banco de Dados**: MySQL
- **Outras Dependências**:
  - `laravel/ui` para scaffolding de autenticação.
  - `axios` para requisições AJAX.
  - `sass` para estilização.

## Requisitos

- PHP 8.1 ou superior
- Composer
- MySQL
- Node.js e npm

## Instalação

1. Clone o repositório:

   ```bash
   git clone https://github.com/gnutzmann/agenda-medica.git
   cd agenda-medica
   ```

2. Instale as dependências do PHP:

   ```bash
   composer install
   ```

3. Instale as dependências do Node.js:

   ```bash
   npm install
   ```

4. Copie o arquivo de configuração `.env.example` para `.env`:

   ```bash
   cp .env.example .env
   ```

5. Configure as variáveis de ambiente no arquivo `.env` (como conexão com o banco de dados).

6. Gere a chave da aplicação:

   ```bash
   php artisan key:generate
   ```

7. Execute as migrações do banco de dados:

   ```bash
   php artisan migrate
   ```

8. Compile os assets do frontend:

   ```bash
   npm run dev
   ```

9. Inicie o servidor de desenvolvimento:

   ```bash
   php artisan serve
   ```

   Acesse a aplicação em [http://localhost:8000](http://localhost:8000).

## Testes

Para executar os testes, use o comando:

```bash
php artisan test
```
--- 

Desenvolvido por Diogo Gnutzmann Santos.
