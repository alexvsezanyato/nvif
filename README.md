Команды выполняются из корня проекта, если не описано иное.
Процесс установки описан для использования в демонстрационном режиме.

- cp .env .env.docker
- ./container build
- ./container up

- docker exec -it coal-php-fpm bash (вход в контейнер с php)
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- exit (выход из контейнера)

- ./container node (вход в контейнер с нодой)
- npx mix

Читаем что ответила команда, если ошибок нет, то получаем список скомпилированных фалов или сообщение что дополнительные зависимости установлены, надо запустить команду ещё раз.

```python
        Additional dependencies must be installed. This will only take a moment.
        
        Running: npm install @babel/preset-react --save-dev --legacy-peer-deps
        
        Finished. Please run Mix again.
```

Если получили такое сообщение, ещё раз вводим ```npx mix```.
Теперь должны получить список скомпилированных файлов.

Уже можно открыть сайт, по умолчанию доступен на http://localhost:8800/ (порт указан в ответе команды ./container up).

Для отправки почты надо сконфигурировать .env
