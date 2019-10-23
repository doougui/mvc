
<h1 align="center">
  Estrutura MVC
</h1>

<h3 align="center">
  Estrutura MVC utilizada em meus projetos. Sinta-se livre para usar e contribuir.
</h3> 

## :rocket: Instalação

:bulb: Para instalar os pacotes, você precisará ter o [Composer](https://getcomposer.org/) instalado em sua máquina. Após ter instalado, entre na pasta `src` usando o Terminal/CMD e digite o seguinte comando:

```
composer update
```

## :ballot_box_with_check: To-do List

Coisas que precisam ser feitas/melhoradas:
  - Redirecionar para o controller de erro caso ocorra algum :heavy_check_mark:
  - Renomear arquivos para seguir as PSRs :heavy_check_mark:
  - Adicionar array de dados no renderLayout() :heavy_check_mark:
  - Sistema de rotas :heavy_check_mark:
  - Implementar algum template engine (twig, plates, etc) :heavy_check_mark:
  - Ajustar projeto de acordo com as PSRs e Design Patterns :x:
  - Fazer navegação utilizando slug (package slugify) :x:
  - Adicionar meta tags para um bom SEO :x:

## :wrench: Uso

### Configuração de acesso

Em `config/config.php`, coloque a pasta onde seu projeto está localizado na variável `$innerFolder`. Caso o projeto esteja localizado na raiz (geralmente quando a aplicação está em produção), deixe a variável em branco (`$innerFolder = "";`).


_**Exemplo**_:

```
$innerFolder = "estrutura_mvc/";
```

URL DE ACESSO:

```
http://localhost/estrutura_mvc/
```

_**Exemplo 2**_:

```
$innerFolder = "";
```

URL DE ACESSO:

```
http://localhost/
```

### Configuração de banco de dados

Em `config/environment.php`, defina o seu ambiente de desenvolvimento entre `development` (desenvolvimento) ou `production` (produção) comentando a linha que não define seu ambiente e descomentando a que define.

Em `config/config.php`, altere a variável global `DB_CONFIG` de acordo com as configurações de banco de dados de sua aplicação.

### Rotas

Em `config/routes.php` defina as rotas do seu projeto. As rotas são divididas em grupos, que são como uma outra aplicação dentro da sua aplicação principal.

_**Exemplo**_:

```
https://www.site.com.br/blog/
```

Para realizar o controle de rotas foi utilizado o package `coffeecode/router`. Para mais informações sobre a utilização do mesmo, acesse [este link](https://packagist.org/packages/coffeecode/router).

### Views

Para as views, utilizaremos o [Template Engine Twig](https://twig.symfony.com/). No arquivo `app/Controllers/Render.php` você pode configurar a localização de suas views alterando a seguinte linha:

```
$this -> loader = new \Twig_Loader_Filesystem(DIRREQ."app/Views/");
```

Por padrão, o cache está ativo para agilizar a renderização das páginas. Se o Twig identifica mudanças nas views ele monta o cache novamente. Para ambiente de desenvolvimento, é recomendado que você desative o cache. Para isso, basta comentar a seguinte linha:

```
'cache' => DIRREQ."app/Views/cache"
```

Para ativar o cache novamente, descomente a linha.

Para mais informações, acesse a [documentação do Twig Template Engine](https://twig.symfony.com/doc/2.x/).

## :warning: Observações

1. Em ambiente de desenvolvimento é importante que você deixa somente as duas últimas linhas do arquivo `.htaccess` descomentadas. O arquivo ficará assim:

```
RewriteEngine On
# Options All -Indexes

# ROUTER WWW Redirect.
# RewriteCond %{HTTP_HOST} !^www\. [NC]
# RewriteRule ^ https://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# ROUTER HTTPS Redirect
# RewriteCond %{HTTP:X-Forwarded-Proto} !https
# RewriteCond %{HTTPS} off
# RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# ROUTER URL Rewrite
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteRule ^(.*)$ ./public/index.php?route=/$1 [L,QSA]
```

2. Crie a pasta "cache" dentro de `app/Views` caso não esteja criada.

3. Em `config/routes.php`, é importante notar que, quando estiver criando as rotas, a rota dinâmica deve ir acima da rota fixa para funcionar corretamente.

_**Exemplo**_:

```
"contato" => [
    "namespace" => "App\Controllers\Contact",
    "group" => "contato",
    "routes" => [
        [
            "method" => "get",
            "route" => "/{dinamica}",
            "handler" => "ContactController:dinamic"
        ],
        [
            "method" => "get",
            "route" => "/fixa",
            "handler" => "ContactController:fixed"
        ]
    ]
]
```

## :mailbox_with_mail: Licença

Sinta-se livre para usar e testar. Quanto mais pessoas contribuírem, melhor!