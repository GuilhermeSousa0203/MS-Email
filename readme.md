# Sobre o Repositório

É a implementação de um microsserviço para envio de emails. A integração é feita por meio de filas e mensageria, usando RabbitMQ.

# Sobre a divisão

A aplicação foi dividida em dois microsserviços

## micro-email

Microsserviço que recebe parâmetros via POST e envia os emails.

- Rodar na porta 8030

## formulario--email

Aplicação que contém um formulário para preenchimento e envio dos parâmetros

- Constrói a mensagem e a envia para a fila

## queue

Script que direciona as mensagens recebidas para a rota de envio de email em micro-email
