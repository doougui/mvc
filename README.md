
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
  - Fazer navegação utilizando slug :x:
  - Refazer os Breadcrumps :x:
  - Adicionar meta tags para um bom SEO :x:

## :warning: Observações

1. No arquivo `Dispatch.php`, é importante notar que, quando estiver criando as rotas, a rota dinâmica deve ir acima da rota fixa para funcionar.

_Exemplo_:

```
$router -> group("contato");
$router -> get("/{dinamico}", "ContatoController:dinamic");
$router -> get("/fixo", "ContatoController:fixed");
```

## :mailbox_with_mail: Licença

Sinta-se livre para usar e testar. Quanto mais pessoas contribuírem, melhor!


