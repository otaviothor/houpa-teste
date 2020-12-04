# Desenvolvimento do projeto
O projeto foi desenvolvido utilizando o padrão MVC e alguns componentes para auxiliar no desenvolvimento. O primeiro deles é o DataLayer que foi utilizado na camada de Modelo, onde ele provém uma abstração de banco de dados utilizando PDO. O segundo é o Router, onde ele foi utlizado para tratar do roteamento do projeto tornando as URLs mais amigáveis. O terceiro e último é o Plates, que é o sistema de templates padrão do PHP. Ele foi utlizado para renderizar a camada de Visão passando como parâmetros, os dados necessários de cada página.

# Padrão
Como foi dito acima, foi utilizado o padrão MVC trazendo mais organização ao projeto e também a PSR-4 que permite que todos os códigos estejam de acordo com as recomendações do PHP-FIG. Os arquivos da camada de Modelo fica dentro da pasta src/Models. Os arquivos da camada de Visão ficam dentro da pasta theme, lá existe um arquivo _theme.php que é o template que todas as outras páginas vão extender através do Plates. Por último, os arquivos da camada de Controlador ficam dentro da pasta src/Controllers. Ainda dentro da pasta src, existe um arquivo Config.php onde ele é referenciado no composer.json como um arquivo de configuração, onde ele possui a parametrização para conexão com banco de dados e algumas funções helpers que ajudam na importação de pacotes, imagens e também no roteamento.

# Configuração
Para que o projeto possa ser rodado, é necessário criar o banco de dados que está no arquivo db.sql. Após isso, deve-se alterar a constante de conexão que está no arquivo src/Config.php, e por último alterar a constante raiz do projeto, também no arquivo src/Config.php de modo que se alterado, não possua a / no final.

# Setup
Rodar os comandos: 
- ```php composer.phar install``` 
- ```npm i```