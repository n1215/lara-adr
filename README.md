# Action-Domain-Responder Pattern with Laravel
- LaravelでADRパターンを実践する例
- 共通のDomainに対してResponderを入れ替えて、HTML, JSONのHTTPレスポンス + コンソールコマンドを実装
- Laravelパッケージとして実装

# 準備

```
# 作業ディレクトリを作成
mkdir lara-adr-app
cd lara-adr-app

# このリポジトリをクローン
git clone https://github.com/n1215/lara-adr

# Laravelアプリケーションを作成
composer create-project --prefer-dist laravel/laravel
cd laravel

# ローカルのComposerパッケージをインストール
composer config repositories.local path "../lara-adr"
composer require n1215/lara-adr
```

# Web API

```
cd lara-adr-app/laravel
php artisan serve
```

- http://localhost:8000/api/users/1
- http://localhost:8000/api/users/2
- http://localhost:8000/api/users/3

### Classes
- Domain: \N1215\LaraAdr\UseCase\UserShowUseCase
- Action: \N1215\LaraAdr\Http\Actions\Api\Users\UserShowAction
- Responder: \N1215\LaraAdr\Http\Responders\UserShowJsonResponder


# Web HTML

```
cd lara-adr-app/laravel
php artisan serve
```

- http://localhost:8000/users/1
- http://localhost:8000/users/2
- http://localhost:8000/users/3

### Classes
- Domain: \N1215\LaraAdr\UseCase\UserShowUseCase
- Action: \N1215\LaraAdr\Http\Actions\WebUserShowAction
- Responder: \N1215\LaraAdr\Http\Responders\UserShowHtmlResponder


# Console

```
cd lara-adr-app/laravel
php artisan user:show 1
php artisan user:show 2
php artisan user:show 3
```

### Classes
- Domain: \N1215\LaraAdr\UseCase\UserShowUseCase
- Action(Command): \N1215\LaraAdr\Console\Commands\UserShowCommand
- Responder: \N1215\LaraAdr\Console\Responders\UserShowConsoleResponder


# 参考
- [pmjones/adr](https://github.com/pmjones/adr)
- [Radar.Project](https://github.com/radarphp/Radar.Project)
- [Presentation Domain Separation](https://martinfowler.com/bliki/PresentationDomainSeparation.html)
- [Single Action Controllers](https://laravel.com/docs/5.4/controllers#single-action-controllers)
- [Lumen/Laravel Action-Domain-Responder(ADR)アプローチ](http://qiita.com/ytake/items/db8cb64493f08f5b9706)
