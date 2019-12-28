
<h1 align="center">
  Estrutura MVC
</h1>

<h3 align="center">
  Estrutura MVC utilizada em meus projetos. Sinta-se livre para usar e contribuir.
</h3> 

## :rocket: Instalação

:bulb: Para instalar os pacotes, você precisará ter o [Composer](https://getcomposer.org/) e algum gerenciador de pacotes JavaScript como [NPM](https://www.npmjs.com/) ou [Yarn](https://yarnpkg.com/lang/en/) instalados em sua máquina.

Para instalar os pacotes do Composer, entre na pasta `src` utilizando o Terminal/CMD e digite o seguinte comando:

```
composer update
```

Para instalar os pacotes, vá para a raiz do projeto utilizando o Terminal/CMD e digite o seguinte comando:

NPM: `npm install`
Yarn: `yarn`

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

## :warning: Observações

Em ambiente de desenvolvimento, é importante que você deixa o arquivo `public/.htaccess` com as seguintes lihas comentadas para evitar erros de redirecionamento:

```
RewriteEngine On
Options All -Indexes

# ROUTER WWW Redirect.
# RewriteCond %{HTTP_HOST} !^www\. [NC]
# RewriteRule ^ https://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# ROUTER HTTPS Redirect
# RewriteCond %{HTTP:X-Forwarded-Proto} !https
# RewriteCond %{HTTPS} off
# RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# ROUTER URL Rewrite
RewriteBase /mvc
RewriteCond %{REQUEST_FILENAME} !-f 
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ ./public/index.php?route=/$1 [L,QSA]
```

Substitua *mvc* (`RewriteBase /mvc`) pelo nome do seu projeto.

## :wrench: Uso

### JavaScript

#### Webpack

Todos os seus arquivos `.js` devem ficar na pasta `public/js/src`.

Este projeto utiliza do [webpack](https://webpack.js.org/) para gerenciamento de módulos e também utiliza do `babel` para criar bundlers e garantir que o código JavaScript rode em qualquer navegador moderno.

O arquivo de configuração do webpack se localiza na raiz do projeto (`webpack.config.js`). Para cada novo arquivo `.js` criado, você deve adicioná-lo como uma chave do objeto `entry` no arquivo de configuração do `webpack`.

Para que seus arquivos `.js` sejam interpretados corretamente, você deve criar um servidor local com o `webpack-dev-server`. Para isso, abra o Terminal/CMD na raiz do projeto e digite `npm run start`.
**OBS:** Caso esse servidor local criado pelo `webpack-dev-server` usar uma porta diferente da padrão (8080), você deve alterar o valor da variável global `DIRJS` no arquivo `config/config.php`. 

Os arquivos finais ficarão na pasta `public/js/dist`. Estes são os arquivos que você deve importar em tags `<script></script>` e afins.

#### Prettier e ESLint

Para garantir a padronização e qualidade de código, este projeto utiliza do [ESLint](https://eslint.org/) e do [Prettier](https://prettier.io/) para automatizar este processo. Para o melhor aproveitamento dessas ferramentas é recomendável que você instale os pacotes do ESLint e Prettier no seu editor/IDE.

O padrão de código do ESLint utilizado é o `Stantard`, mas você pode trocar alterando o arquivo `.eslintrc` na raiz do projeto. Caso prefira, você pode excluir este arquivo e executar o comando `npx eslint --init` caso esteja usando o NPM, ou `yarn run eslint --init` caso esteja usando o Yarn. Isso irá re-criar o arquivo com as configurações de sua preferência.

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

Em `config/routes.php` defina as rotas do seu projeto. As rotas são divididas em grupos.

_**Exemplo**_:

```
https://www.site.com.br/blog/
```

**OBS:** Em `config/routes.php`, é importante notar que, quando estiver criando as rotas, a rota dinâmica deve ir acima da rota fixa para funcionar corretamente.

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

Para realizar o controle de rotas foi utilizado o package `coffeecode/router`. Para mais informações sobre a utilização do mesmo, acesse [este link](https://packagist.org/packages/coffeecode/router).

### Views

Para as views, utilizaremos o [Template Engine Twig](https://twig.symfony.com/). No arquivo `app/Controllers/Render.php` você pode configurar a localização de suas views alterando a seguinte linha:

```
$this->loader = new \Twig_Loader_Filesystem(DIRREQ."app/Views/");
```

Por padrão, o cache está ativo para agilizar a renderização das páginas. Se o Twig identifica mudanças nas views ele monta o cache novamente. Para ambiente de desenvolvimento, é recomendado que você desative o cache. Para isso, basta comentar a seguinte linha:

```
'cache' => DIRREQ."app/Views/cache"
```

Para ativar o cache novamente, descomente a linha.

Para mais informações, acesse a [documentação do Twig Template Engine](https://twig.symfony.com/doc/2.x/).

## :mailbox_with_mail: Licença

Sinta-se livre para usar e testar. Quanto mais pessoas contribuírem, melhor!
