# NemoTravel

## by Yessalinov Arystanbek

### Требования

- PHP >= 8.0
- Composer
- СУБД (PostgreSQL)
- Web сервер (Nginx)

### Установка

1. **Клонирование репозитория**

   ```shell
   git clone url_репозитория
   cd имя_папки_проекта
   ```

2. **Установите все зависимости Composer**
   Установите все зависимости Composer.
    ```shell
   composer install
   ```

3. **Конфигурация приложения**

   Скопируйте файл .env.example в .env.
    ```shell
    cp .env.example .env
   ```
   Откройте файл .env и настройте параметры окружения (база данных, почта, и т.д.):

   ```shell
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=имя_базы_данных
    DB_USERNAME=пользователь_базы_данных
    DB_PASSWORD=пароль_базы_данных
   ```

4 **Генерация ключа приложения**

Сгенерируйте уникальный ключ приложения для обеспечения безопасности сессий и зашифрованных данных.

   ```shell
   php artisan key:generate
   ```

5 **Миграции и начальное заполнение базы данных**

Запустите миграции и, если необходимо, начальное заполнение базы данных.

   ```shell
    php artisan migrate
    php artisan app:parse-airports
   ```

## Использование

### Для облегчения запуска в каждой папке лажат докерфайлы для работы с сервисами

**Чтобы запустить докер вам нужно будет перейти в папку и ввести команду**

   ```shell
      docker-compose up -d
      docker-ps получаем id контейнера приложения
      docker exec -it <container_id> php artisan migrate
      docker exec -it <container_id> php artisan app:parse-airports для заполнения базы данных аэропортами
   ```

- localhost:8000 - адрес приложения


