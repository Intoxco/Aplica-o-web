# Aplica-o-web

Primeira coisa, instala o composer, aperta ctrl + ' no vscode e digita composer install no terminal, vai instalar tudo do roteamento.
depois: 
1. Entre em C:\xampp\apache\conf\extra
2. Então, edite o arquivo httpd-vhosts.conf em qualquer IDE:
4. Adicione as seguintes linhas ao final do arquivo e salve:
5. 
<VirtualHost *:80>
DocumentRoot "C:\xampp\htdocs\trabalhoComBanco"
ServerName trabalhoComBanco.test
<Directory "C:\xampp\htdocs\trabalhoComBanco">
</Directory>
</VirtualHost>


6. Agora, acesse Windows > Search > Run e cole a seguinte linha:
   
C:\Windows\System32\drivers\etc\hosts

Importante: abra esse arquivo como administrador. Edite o arquivo no VS Code ou uma IDE,
pois ele disponibiliza um botão para "Tentar como Admin". Se você abrir no Notepad, o
programa irá tentar salvar com a extensão .txt... isso não deve ocorrer.

8. Agora, com o arquivo hosts aberto você irá escrever a seguinte linha ao final do arquivo:
127.0.0.1 trabalhoComBanco.test
   

10. Depois de salvar tudo, reinicie o Apache pelo painel do Xampp.
    
11. Agora, entre em http://trabalhoComBanco.test no navegador. Ao entrar, o navegador deve
carregar o seu projeto e as rotas transparentes devem funcionar corretamente.
