<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## 📦 Sistema de Gestão de Pedidos
O Sistema de Gestão de Pedidos é uma aplicação desenvolvida em Laravel para facilitar o gerenciamento de pedidos, integrando informações de clientes, produtos e fornecedores. O ponto de centralização das informações é a tabela de produtos, com uso dos models, principal o Item.php, que estabelece mais relações para a tabela produtos.

### Integração com a Aplicação

- Os modelos Eloquent na pasta `app/` representam as tabelas do banco e estabelecer relações com demais tabelas, alguns como ponto central dos Relacionamentos. 
- Os controllers gerenciam a lógica de negócio e interagem com os modelos para operações CRUD. Alguns deles não estão configurados todas as funcões, mas não afetam a utilização do projeto como esta.
- Middlewares e outros serviços podem registrar acessos ou controlar autenticação com base nos dados do banco.

Esta estrutura garante uma abordagem organizada e escalável para o gerenciamento dos dados da aplicação.

Para mais detalhes, consulte a documentação oficial do Laravel sobre [Migrations](https://laravel.com/docs/migrations) e [Eloquent ORM](https://laravel.com/docs/eloquent).

## Banco de Dados

Este projeto utiliza um banco de dados relacional para gerenciar as informações essenciais do sistema de gestão de pedidos. A estrutura do banco é definida e mantida por meio das migrations do Laravel, enquanto os seeders são usados para popular os dados iniciais.

### Entidades Principais e Relacionamentos

- **Clientes:** Armazena informações dos clientes.
- **Fornecedores:** Detalhes dos fornecedores.
- **Produtos:** Informações dos produtos, relacionados a fornecedores e unidades.
- **Detalhes dos Produtos:** Informações adicionais dos produtos.
- **Pedidos:** Representa os pedidos realizados pelos clientes.
- **Produtos dos Pedidos:** Tabela pivô que relaciona pedidos e produtos com quantidades.
- **Motivos de Contato:** Razões para contatos via site.
- **Contatos do Site:** Armazena mensagens enviadas pelo formulário de contato.
- **Logs de Acesso:** Registra eventos de acesso dos usuários.
- **Unidades:** Unidades de medida para os produtos.
- **Usuários:** Usuários do sistema para autenticação.

### Gerenciamento do Esquema do Banco

- **Migrations:** Localizadas em `database/migrations/`, definem a estrutura das tabelas e alterações no esquema.
- **Seeders:** Localizados em `database/seeds/`, populam as tabelas com dados iniciais ou de teste.

### Configuração do Banco de Dados

1. Configure o arquivo `.env` com as credenciais corretas do banco de dados.
2. Execute as migrations para criar as tabelas:
   ```
   php artisan migrate
   ```
3. (Opcional) Execute os seeders para popular os dados iniciais:
   ```
   php artisan db:seed
   ```
## ✅ Requisitos e Compatibilidade do Projeto

### 📦 Laravel

- **Versão do framework**: `^7.29`
- Desenvolvido para uso com PHP **7.2.5 até 7.4**.
- **Incompatível com PHP 8.1+ sem ajustes específicos**, podendo gerar erros como:
  - `Return type should be compatible with ArrayAccess::offsetExists(...)`
  - `Deprecated: Function ... is deprecated`

---

### ⚙️ Requisitos definidos no `composer.json`

```json
"php": "^7.2.5"
