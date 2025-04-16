# Caminho do container
PHP_CONTAINER=laravel-app

# Sobe os containers
up:
	docker compose up -d

# Derruba os containers
down:
	docker compose down

# Reconstrói a imagem do PHP
build:
	docker compose build

# Acessa o container do PHP
bash:
	docker exec -it $(PHP_CONTAINER) bash

# Roda comandos artisan (ex: make artisan cmd="migrate")
artisan:
	docker exec -it $(PHP_CONTAINER) php artisan $(cmd)

# Roda comandos artisan (ex: make artisan cmd="migrate")
comandos:
	docker exec -it $(PHP_CONTAINER) php artisan $(cmd)

# Roda Composer (ex: make composer cmd="install")
composer:
	docker exec -it $(PHP_CONTAINER) composer $(cmd)

# Roda npm no container (se tiver Node configurado)
npm:
	docker exec -it $(PHP_CONTAINER) npm $(cmd)

# Permissões para storage e cache
permissions:
	docker exec -it $(PHP_CONTAINER) chmod -R 775 storage bootstrap/cache

# Instala o Laravel (caso ainda não tenha)
install-laravel:
	docker run --rm -v $$PWD:/app composer create-project laravel/laravel:^12.0 .

# Limpa caches
clear:
	make artisan cmd="optimize:clear"
