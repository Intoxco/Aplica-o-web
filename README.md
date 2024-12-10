# Aplica-o-web

Alunos Rafael Boldt e Luciana Ramos

Participação individual
Rafael:banco de dados; espaço do administrador(cadastro aluno e professor), incluindo banco de dados;
Luciana: A maioria do css, parte do cadastro de notas no professor e visualização do boletim do aluno; roteamento;
A parte de cadastro e visualização dos horários foi desenvolvida em conjunto pelos dois alunos;


Execução passo a passo:
1-Baixe o conteúdo desse repositório
2-Instale o Xampp (https://www.apachefriends.org/pt_br/index.html)
3-Instale o Composer (https://getcomposer.org)
4-Inicie o Apache e o MySql
5-Coloque a pasta trabalhoComBanco na pasta htdocs no xampp
6-Abra o http://localhost/phpmyadmin e crie um banco de dados chamado trabalhophp, então importe o arquivo disponibilizado no repositório
7-Abra o VSCode(ou sua IDE) de preferência, e abra a pasta trabalhoComBanco
8-Aperte ctrl + ' e digite composer install no terminal
9-Recomendamos o uso de uma virtual host pras rotas transparentes funcionare, segue o tutorial de como fazer no windows:
  1. Entre em C:\xampp\apache\conf\extra
  2. Então, edite o arquivo httpd-vhosts.conf em qualquer IDE:
  3. Adicione as seguintes linhas ao final do arquivo e salve:
    <VirtualHost *:80>
    DocumentRoot "C:\xampp\htdocs\trabalhoComBanco"
    ServerName seu-projeto.test
    <Directory "C:\xampp\htdocs\trabalhoComBanco">
    </Directory>
    </VirtualHost>
    Importante: substituir seu_projeto com a pasta do seu projeto.
  4. Agora, acesse Windows > Search > Run e cole a seguinte linha:
    C:\Windows\System32\drivers\etc\hosts
    Importante: abra esse arquivo como administrador. Edite o arquivo no VS Code ou uma IDE,
    pois ele disponibiliza um botão para "Tentar como Admin". Se você abrir no Notepad, o
    programa irá tentar salvar com a extensão .txt... isso não deve ocorrer.
  5. Agora, com o arquivo hosts aberto você irá escrever a seguinte linha ao final do arquivo:
    127.0.0.1 trabalhoComBanco.test
  6. Depois de salvar tudo, reinicie o Apache pelo painel do Xampp.
  7. Agora, entre em http://trabalhoComBanco.test no navegador(de preferência o Chrome). Ao entrar, o navegador deve
  carregar o seu projeto e as rotas transparentes devem funcionar corretamente.
