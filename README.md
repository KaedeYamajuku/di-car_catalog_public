# docker_laravel

## ■環境構築
※PHPのバージョンは要件に応じて変更してください。（docker/app/Dockerfile を変更）

1．下記スクリプト実行
```angular2html
docker-compose build
```
2．laravelのインストール
```
docker-compose run --rm app composer create-project --prefer-dist laravel/laravel . "お好きなバージョン"
```
3．コンテナの起動
```
docker-compose up -d
```
4．コンテナ内に入る
```
docker-compose exec app bash
```
5．envの作成
```
cp .env.example .env
```
6．composerインストール実行
```
composer install
```
7．下記にアクセスしLaravelのトップ画面にアクセス出来たら初期構築完了
* Docker
  http://localhost/

* Docker toolboxを使用している場合はコンソールに表示されるIPにアクセスしてください

## ■その他
* windows特有のnpm関連のバグ対策としてnode_modulesをコンテナ内に展開する処理をdocker-compose内に記載してあります。
必要に応じて削除してください。
* 