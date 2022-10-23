## オートコーディネーター

#### 毎日の服を自動で選んでくれるアプリ

1. 持っている服を登録
2. 長袖 or 半袖、上着ありかどうかを選択
3. 今日のコーディネートが提案される

#### 対象
* おしゃれにそこまで興味ない男子大学生
* 外出先
    大学
    バイト先
    遊び（買い物、外食）
    アウトドア

#### 機能
- ユーザー登録
- ログイン
- ログアウト
- 服,ズボン,上着服登録
- 服,ズボン,上着削除
- 服,ズボン,上着一覧
- コーディネート検索
- お気に入り登録

#### テーブル
##### users
- id

##### clothes
- id
- user_id
- sleeve (long=0, short=1)
- color
- image (path)

##### pants
- id
- user_id
- length (long=0, short=1)
- color
- image (path)

##### jackets
- id 
- user_id
- color
- image (path)

##### favorites
- id
- user_id
- cloth_id
- pants_id
- jacket_id

(timestamp略)
## clone後の操作

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
