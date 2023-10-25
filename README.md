

# Sistema Para Execução de Exercícios em Oficinas de Improvisação Teatral

Este sistema está sendo desenvolvido para oferecer suporte a exercícios de improvisação teatral, contando com:

- Sorteio de palavras
- Sorteio de participantes de exercícios

Um módulo administrador permite:

- Cadastrar e gerenciar usuários
- Cadastrar e gerenciar pessoas/alunos
- Cadastrar e gerenciar palavras

## Executando o projeto

O projeto utiliza as tecnologias PHP, Laravel, MySQL e Docker. Os passos seguintes explicam como executar o projeto. 

### Instale o Docker
[Tutorial de instalação para Linux](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04-pt)

### Clone o repositório no Github:
`git clone https://github.com/pedrohenriquebrandao/kit-improviso.git`

### Acesse a pasta do projeto e rode o comando abaixo para executar o servidor:
`cd kit-improviso` e `./vendor/bin/sail up`

### Para acessar o phpmyadmin:
`http://localhost:8080/`

User: `sail` <br>
Senha: `password`

### Execute a migrations no banco de dados:
`./vendor/bin/sail php artisan migrate`
