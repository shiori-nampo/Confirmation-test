# お問い合わせ管理フォーム

## 環境構築

Dockerビルド
- git clone -b main  https://github.com/shiori-nampo/Confirmation-test/tree/main
- docker compose up -d --build

Laravel環境開発
- docker compose exec php bash
- composer install
- cp .env.example .env
- php artisan migrate --seed
- php artisan serve

開発環境

- お問い合わせ画面:http://localhost:8000/
- ユーザー登録画面:http://localhost:8000/register
- phpmyadmin:http://localhost:8080

使用技術（実行環境）
- nginx 1.21.1
- php 8.1-fpm
- Laravel  "^8.75"
- mysql:8.0


## ER図
![ER図](doc/er_diagram.png)

# URL
- 開発環境:https://github.com/shiori-nampo/Confirmation-test/tree/main