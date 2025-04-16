# 📦 API de Usuários - Laravel

Este projeto é uma API RESTful desenvolvida com **Laravel** e empacotada usando **Docker** para gerenciar usuários. Permite operações como criação, listagem, atualização e exclusão de usuários via requisições HTTP.

---

## 🚀 Tecnologias

- PHP 8.2
- Laravel 12
- MySQL (Docker)
- Docker & Docker Compose
- Sanctum (Para autenticação via token)

---

### Pré-requisitos

- Docker
- Docker Compose

## ⚙️ Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/EduardoAssis99/conectala.git
   cd conectala
   ```

2. Copie o arquivo `.env`:
   ```bash
   cp .env.example .env
   ```

3. Configure o banco de dados no `.env`:
   ```env
   DB_DATABASE=laravel
   DB_USERNAME=laravel
   DB_PASSWORD=laravel
   ```

4. Suba os containers:
   ```bash
   docker compose up -d --build
   ```

5. Acesse o container do app e rode as migrations:
   ```bash
   docker exec -it laravel-app composer install
   ```

6. Acesse o container do app e rode as migrations:
   ```bash
   docker exec -it laravel-app chmod -R 775 storage bootstrap/cache
   ```

7. Acesse o container do app e rode as migrations:
   ```bash
   docker exec -it laravel-app php artisan migrate
   ```

8. Popule o banco com dados:
   ```bash
   php artisan db:seed
   ```
---

## 🐳 Comandos úteis Docker

```bash
# Subir containers
docker-compose up -d --build

# Derrubar containers
docker-compose down

# Acessar o container do Laravel
docker exec -it laravel-app bash

# Rodar Artisan
docker exec -it laravel-app php artisan migrate

#Verificar os containers rodando:
docker ps
```

---

## 🧪 Endpoints

| Método | Rota                     | Descrição                       | Auth |
|--------|--------------------------|---------------------------------|------|
| GET    | `/api/`                  | Verifica se a API está ativa    | ❌   |
| GET    | `/api/login`             | Realiza autenticação do usuário | ❌   |
| GET    | `/api/logout`            | Desloga usuário autenticado     | ✅   |
| GET    | `/api/users`             | Lista todos os usuários         | ✅   |
| POST   | `/api/user/store`        | Cria um novo usuário            | ✅   |
| GET    | `/api/user/{id}`         | Mostra um usuário específico    | ✅   |
| PUT    | `/api/user/update/{id}`  | Atualiza um usuário             | ✅   |
| DELETE | `/api/user/{id}`         | Deleta um usuário               | ✅   |

---

## 🐞 Erros Comuns

- **403 Forbidden**: Ação não autorizada — verifique `Policy`, `Gate` ou falta de token.
- **404 Not Found**: Usuário não encontrado — ID inexistente ou Model Binding sem resultado.
- **500 Internal Error**: Verifique permissões dos diretórios `storage/` e `bootstrap/cache`.

---

## ✍️ Autor

Desenvolvido por [Carlos Eduardo Assis](https://github.com/EduardoAssis99) 🚀

---

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.