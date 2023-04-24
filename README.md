 # Pacote OpenAI API
 
 Este pacote é uma biblioteca PHP para acessar a API da OpenAI, feito com o objetivo de facilitar a integração de aplicações PHP com a API da OpenAI.
 
 ## Instalação
 
 Para instalar este pacote, você precisa ter o [Composer](https://getcomposer.org/) instalado em sua máquina. Em seguida, execute o seguinte comando no terminal:
 
 ```
 composer require rafazingano/openai
 ```
 
 ## Utilização
 
 Para utilizar este pacote, basta incluir o autoload do Composer em seu arquivo PHP e iniciar a utilização das classes do pacote.
 
 ```php
 require_once 'vendor/autoload.php';
 
 use RafaZingano\OpenAi\OpenAi;
 
 $openai = new OpenAi();
 ```
 
 ## Classes disponíveis
 
 Atualmente, este pacote conta com as seguintes classes:
 
 - OpenAi: classe principal para acesso à API da OpenAI.
 
 ## Documentação
 
 A documentação completa deste pacote está disponível na [Wiki](https://github.com/rafazingano/openai/wiki) deste repositório no GitHub.
 
 ## Contribuições
 
 Este pacote é de código aberto e aceita contribuições. Se você tiver alguma sugestão ou encontrar algum bug, por favor, abra uma [issue](https://github.com/rafazingano/openai/issues) ou envie um [pull request](https://github.com/rafazingano/openai/pulls).
 
 ## Licença
 
 Este pacote está disponível sob a licença MIT. Veja o arquivo [LICENSE](https://github.com/rafazingano/openai/blob/master/LICENSE) para mais informações.
