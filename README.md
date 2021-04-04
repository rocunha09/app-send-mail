### app-send-mail
Criando Aplicação Web para envio de E-mails com uso da lib: **PHPMailer**, e praticando orientação a objetos.

Está sendo realizado uso de **importação manual** da biblioteca como forma de praticar, e a versão da biblioteca **PHPMailer que está sendo usada é a v6.0.0,** que pode ser encontrada aqui: [PHPMailer](https://github.com/PHPMailer/PHPMailer/tree/v6.0.0)

### Como testar este projeto: (exemplo: usando o **xampp**).

1. _Recorte_ a pasta **app-send-mail que contém as bibliotecas e lógica** e _cole_ na **pasta raiz do xampp**.
2.  _Cole_ a pasta do projeto (app-send-mail que contém os arquivos públicos) na pasta pública do xampp (**htdocs**).
3. No Arquivo **config-example.php** _apague_ a parte **"-example"** do nome do arquivo, permanecendo apenas: "**config.php**", então abra e insira o **E-mail** que será utilizado pela aplicação, e a **Senha**, e configurações do SMTP do servidor de E-mail que você utiliza. 
---------------------------------------
Descrição dos parâmetros do arquivo **config.php**:

- Ativa a impressão de debug da execução do script de envio:

`define("DEBUG_OUTPUT", 0);`

- Especifica o servidor SMTP: (neste caso está sendo utilizado do Gmail)

`define("HOST", 'smtp.gmail.com'); `

- Ativa a autenticação SMTP:

`define("ENABLE_AUTH", true);`

- E-mail que será usado pela aplicação para envio dos E-mails:

`define("EMAIL_USERNAME", 'example@gmail.com');`

- Senha do E-mail especificado no parâmetro anterior:

`define("EMAIL_PASSWORD", 'pass123456');`

- Ativação e seleção de encriptação para envio de E-mail: (pode-se utilizar TLS ou SSL)

`define("EMAIL_SECURE", 'tls');`

- Porta utilizada pelo Servidor SMTP: (neste caso 587 pois está sendo usado TLS no parâmetro anterior conforme especificação do Gmail) [Ver Aqui](https://support.google.com/a/answer/176600?hl=pt-BR#:~:text=Configurar%20o%20app%20ou%20dispositivo,usando%20o%20TLS%2C%20digite%20587.)

`define("EMAIL_PORT", 587); `

---------------------------------------
Possibilidades de uso para o primeiro parâmetro (**DEBUG_OUTPUT**):
  
**0 ou FALSE**: **desativará** a depuração, geralmente é usado para produção.
1. **Cliente**: irá mostrar-lhe as mensagens enviadas pelo cliente.
2. **Cliente e servidor**: irá adicionar mensagens do servidor, é a configuração recomendada.
3. **Cliente, servidor e conexão**: irá adicionar informações sobre as informações iniciais, pode ser útil para descobrir falhas STARTTLS.
4. **Informações de baixo nível**: use o nível 3 ou 4 se você não conseguir se conectar.

---------------------------------------
### **IMPORTANTE** Ajustando as configurações de acesso ao **SMTP do Gmail**

1) Acesse a conta do Gmail utilizada para o envio de e-mails, na sequência clique sobre o ícone de usuário e acesse a opção "Google Account";

2) Em "Google Account" acesse a opção "Security";

3) Na página "Security" procure pela opção "Less secure app access" e clique no link "Turn on access (not recommended)";

4) Ao acessar o link do passo anterior, clique sobre o botão "on/off" para marcar opção "Allow less secure apps" como "ON";
