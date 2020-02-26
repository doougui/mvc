
<h1 align="center">
  Estrutura MVC
</h1>

<h3 align="center">
  Estrutura MVC utilizada em meus projetos. Sinta-se livre para usar e contribuir.
</h3> 

## :rocket: Instalação

:bulb: Para instalar os pacotes, você precisará ter o [Composer](https://getcomposer.org/) e algum gerenciador de pacotes JavaScript como [NPM](https://www.npmjs.com/) ou [Yarn](https://yarnpkg.com/lang/en/) instalados em sua máquina.

Para instalar os pacotes do Composer, acesse a raiz do projeto utilizando o Terminal/CMD e digite o seguinte comando:

```
composer update
```

Para instalar os pacotes, vá para a raiz do projeto utilizando o Terminal/CMD e digite o seguinte comando:

NPM: 
```
npm install
```

Yarn: 
```
yarn
```

## :ballot_box_with_check: To-do List

Coisas que precisam ser feitas/melhoradas:
  - Redirecionar para o controller de erro caso ocorra algum :heavy_check_mark:
  - Renomear arquivos para seguir as PSRs :heavy_check_mark:
  - Adicionar array de dados no renderLayout() :heavy_check_mark:
  - Sistema de rotas :heavy_check_mark:
  - Implementar algum template engine (twig, plates, etc) :heavy_check_mark:
  - Ajustar projeto de acordo com as PSRs e Design Patterns :heavy_check_mark:
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

Em ambiente de produção, você deve deletar o arquivo `.htaccess` localizado na raiz do projeto e colocar os conteúdos da pasta `public` dentro da pasta `public` do seu servidor, todo o resto deve permanecer fora desta pasta.

## :wrench: Uso

### JavaScript

#### Webpack

Todos os seus arquivos `.js` devem ficar na pasta `resources/js`.

Este projeto utiliza do [laravel-mix](https://laravel-mix.com/) para gerenciamento de módulos e garantir que o código JavaScript rode em qualquer navegador moderno, além de transformar código SASS em CSS.

O arquivo de configuração do webpack se localiza na raiz do projeto (`webpack.mix.js`). 

Utilize o comando `npm run dev|watch|hot|production` para iniciar o webpack.

Os arquivos finais ficarão na pasta `public/js`. Estes são os arquivos que você deve importar em tags `<script></script>` e afins.

### Configuração de acesso

No arquivo `.env` você deve colocar todas as informações de acesso. Caso prefira, você também pode alterar os valores padrão no arquivo `config/Config.php` e no arquivo `.env`, deixar os valores de produção.

Você pode encontrar um exemplo de quais informações devem ser inseridas no arquivo `.env` em `.env.example`, localizado na raiz do projeto.

### Rotas

Em `app/Dispatch.php` defina as rotas do seu projeto.

**OBS:** Quando definindo as rotas, é importante notar que a rota dinâmica deve ir acima da rota fixa para funcionar corretamente.

_**Exemplo**_:

```
$router->namespace("App\Controllers\Contact");
$router->group("contato");
$router->get("/{dinamica}", "ContactController:dinamic", "contact.dinamic");
$router->get("/fixa", "ContactController:fixed", "contact.fixed");
```

Para realizar o controle de rotas foi utilizado o package `coffeecode/router`. Para mais informações sobre a utilização do mesmo, acesse [este link](https://packagist.org/packages/coffeecode/router).

### Views

Para as views, utilizaremos o [Template Engine Twig](https://twig.symfony.com/). No arquivo `app/Controllers/Controller.php` você pode configurar o caminho das views alterando a seguinte linha:

```
$this->loader = new FilesystemLoader(dirname(__DIR__, 2)."/views");
```

O Twig usa um sistema de cache, portanto, se o Twig identifica mudanças nas views ele monta o cache novamente. Para ambiente de desenvolvimento, é recomendado que você desative o cache. Para isso, basta comentar a seguinte linha (caso ainda não esteja comentada):

```
"cache" => dirname(__DIR__, 2)."/views/cache",
```

Em produção, lembre-se de setar a opção `debug` como `false` e comentar a seguinte linha:

```
$this->twig->addExtension(new DebugExtension());
```

Para mais informações, acesse a [documentação do Twig Template Engine](https://twig.symfony.com/doc/2.x/).

## :mailbox_with_mail: Licença

Sinta-se livre para usar e testar. Quanto mais pessoas contribuírem, melhor!
