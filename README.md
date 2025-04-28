

---

# Plataforma de Login e Cadastro

Este é um projeto básico de login e cadastro utilizando **HTML**, **CSS** e **PHP**, estruturado para facilitar a organização entre **frontend** e **backend**.

## 🛠 Estrutura de Pastas

```
├── frontend/
│   ├── assets/             # Imagens, fontes, etc.
│   ├── js/
│   │   ├── auth.js         # Lógica de login e cadastro
│   └── index.html          # Tela inicial de login/cadastro
│
├── backend/
│   ├── app/
│   │   ├── Models/         # User.php (modelagem de usuário)
│   │   ├── Controllers/    # AuthController.php (controle de login/cadastro)
│   │   └── Middleware/     # AuthMiddleware.php (verificação de autenticação)
│   ├── config/             # Database.php (configuração do banco)
│   ├── routes/             # api.php (rotas da aplicação)
│   └── public/             # index.php (ponto de entrada)
│
├── database/
│   ├── migrations/         # Estrutura das tabelas
│   └── seeds/              # Dados iniciais (opcional)
│
└── tests/                  # Testes automatizados
```

---

## 🚀 Como rodar o projeto localmente

### Pré-requisitos

- [XAMPP](https://www.apachefriends.org/pt_br/index.html) instalado
- [VS Code](https://code.visualstudio.com/) com a extensão **XAMPP Server** ou **XAMPP Runner** (opcional)
- PHP instalado (vem junto no XAMPP)

---

### Passo a Passo

1. Clone o repositório:

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
```

2. Coloque o projeto dentro da pasta `htdocs` do seu XAMPP:

```bash
C:/xampp/htdocs/nome-do-projeto/
```

3. Crie o banco de dados:
   - Abra o [phpMyAdmin](http://localhost/phpmyadmin).
   - Crie um banco chamado, por exemplo, **login_system**.
   - Execute os scripts SQL que estão na pasta `database/migrations/` para criar as tabelas.

4. Configure a conexão com o banco:
   - No arquivo `backend/config/Database.php`, atualize com as credenciais do seu banco local.

5. Inicie o servidor Apache pelo XAMPP ou pela extensão no VS Code.

6. Acesse o projeto:
   ```bash
   http://localhost/nome-do-projeto/frontend/
   ```

---

## 🧩 Funcionalidades

- Cadastro de novos usuários
- Login com autenticação
- Criptografia de senha (senha salva de forma segura)
- Estrutura backend separada do frontend
- Organização pronta para projetos maiores

---

## 🧑‍💻 Tecnologias Utilizadas

- HTML5
- CSS3
- JavaScript
- PHP 8+
- MySQL (phpMyAdmin)
- XAMPP

---

## 📋 Futuras Melhorias

- Sistema de recuperação de senha
- Painel de usuário após login
- Upload de foto de perfil
- Melhorias no sistema de autenticação (JWT ou sessões PHP)

---

## 🤝 Contribuição

Sinta-se livre para enviar pull requests ou sugerir melhorias!  
Toda ajuda é bem-vinda!

---


