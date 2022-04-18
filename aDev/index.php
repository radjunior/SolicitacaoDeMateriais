<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dev Index</title>
</head>

<body>
    <header>
        <h1>Cadastro de Pessoas</h1>
    </header>
    <main>
        <div class="titulo">
            <h2>Pessoas</h2>
        </div>
    </main>
    <div class="container">
        <div>
            <label for="txtNome">Nome</label>
            <input type="text" name="txtNome" id="txtNome">
        </div>
        <div>
            <label for="txtIdade">Idade</label>
            <input type="number" name="txtIdade" id="txtIdade">
        </div>
        <div>
            <button onclick="pess.salvar()" id="btn1">Salvar</button>
        </div>
    </div>
    </div>
    <div class="divTabela">
        <table id="TabelaHome">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Idade</td>
                </tr>
            </thead>
            <tbody id="tBody">

            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript" src="main.js"></script>

</html>