<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de Emails</title>
</head>
<body>
    <h1>Sou a aplicação de id 1! Envie um email para alguém:</h1>
    <form method="post">
        <fieldset>
            <span>Destinatário</span>
            <input type="text" name="destinatario" />
        </fieldset>
        <fieldset>
            <span>Assunto</span>
            <input type="text" name="assunto" />
        </fieldset>
        <fieldset>
            <span>Corpo</span>
            <textarea name="corpo"></textarea>
        </fieldset>

        <button type="submit">Enviar email</button>
    </form>
</body>
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        border: 0;
        outline: 0;
        font-family: sans-serif;
        font-size: 15px;
    }
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100vw;
        height: 100vh;
    }
    h1 {
        font-size: 20px;
        margin-bottom: 20px;
    }
    form {
        width: 550px;
        padding: 10px;
        border: 1px solid black;
        border-radius: 4px;
    }
    input, textarea {
        padding: 5px;
        border: 1px solid #CCC;
        width: 100%;
        border-radius: 4px;
    }
    textarea {
        height: 100px;
    }
    button {
        border-radius: 4px;
        width: 100%;
        padding: 5px;
        background-color: darkslateblue;
        color: #FFF;
        font-weight: 600;
        transition: .3s;
    }
    button:hover {
        background-color: darkslategray;
        cursor: pointer;
    }
    form span {
        font-weight: 600;
    }
</style>
</html>