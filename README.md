# 📚 API Escolar em PHP Puro

Este repositório contém uma **API construída em PHP puro**, desenvolvida para resolver um antigo problema de gerenciamento em uma instituição escolar. A API foi projetada com foco em simplicidade, eficiência e boas práticas, proporcionando um gerenciamento eficaz de dados escolares.

---

## 🚀 Funcionalidades Principais

- **Gerenciamento de Alunos**: Cadastro, consulta, atualização e exclusão de dados.
- **Controle de Turmas**: Organização de alunos e professores por turma.
- **Gestão de Professores**: Registro e manutenção de informações dos professores.
- **Eventos Escolares**: Criação e gerenciamento de eventos como reuniões e palestras.
- **Relatórios Personalizados**: Geração de relatórios baseados nos dados cadastrados.

---

## 🛠️ Tecnologias Utilizadas

- **PHP Puro**: Desenvolvimento sem o uso de frameworks.
- **MySQL**: Banco de dados para armazenamento das informações.
- **JSON**: Formato para troca de dados entre cliente e servidor.
- **Arquitetura MVC**: Estrutura modular para separação de responsabilidades.
- **Postman**: Ferramenta para teste e validação dos endpoints da API.

---

## 📂 Estrutura do Projeto

```plaintext
📦 RestApi
├── 📂 models        # Lógica de acesso e manipulação de dados (Model)
├── 📂 controlers    # Lida com as requisições HTTP (Controller)
├── 📂 routers       # Define as rotas disponíveis na API
├── 📂 database      # Configuração e scripts do banco de dados
├── 📂 tests         # Scripts de teste para os endpoints
└── index.php        # Arquivo principal da aplicação
