## Auto Coordinator

### clone後の操作

1. Laravel Sail の実行に必要な vendor ディレクトリをコマンドを実行して用意する

docker run --rm \

    -u "$(id -u):$(id -g)" \
    
    -v $(pwd):/var/www/html \
    
    -w /var/www/html \
    
    laravelsail/php81-composer:latest \
    
    composer install --ignore-platform-reqs
  



2. .envファイルを用意する(.env.exampleをコピー)

    DB_CONNECTION=mysql

    DB_HOST=mysql

    DB_PORT=3306

    DB_DATABASE=auto_coordinator2

    DB_USERNAME=sail

    DB_PASSWORD=password




3. 下記コマンドでコンテナを立ち上げる


./vendor/bin/sail up -d

立ち上がったら下記コマンドを順に実行し，アプリケーションの準備を整える．


    ./vendor/bin/sail php artisan key:generate

    ./vendor/bin/sail php artisan migrate

ブラウザから localhost にアクセスするとアプリケーションの動作が確認できる．

コンテナ終了させるときは下記コマンドを実行する．


    ./vendor/bin/sail down
