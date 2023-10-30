<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <script src="{{asset('js/formulario.js')}}"></script>
    <title>Edição</title>
</head>
<body>
<div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
    <div class="menu">
        <div class="menu-content">
            <a href="/formulario">Cadastrar usuários</a>
            <a href="/usuarios">Usuários cadastrados</a>
        </div>
    </div>
    <script src="{{asset('js/menu.js')}}"></script>
<div class="container">
    <form action="/usuarios/update/{{$formulario->id}}" method="POST">
        @csrf
        @method('POST')
        <div class="left-section">
            <fieldset class="dadosfield">
                <legend>Dados Pessoais</legend>
                <div class="form-group">
                    <label for="nome">Nome Completo:</label>
                    <input type="text" id="nome" name="name" value="{{isset($formulario->name) ? $formulario->name : old('name')}}">
                </div>
                <!-- <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" class="cpf" onblur="validarCPF()">
                    <div id="resultado" class="resultado" value="{{isset($formulario->cpf) ? $formulario->cpf : old('cpf')}}"></div>
                </div>
                <script>
                    function validaCPF(cpf) {
                        cpf = cpf.replace(/[^\d]/g, '');

                        if (cpf.length !== 11) {
                            return false;
                        }

                        if (/^(\d)\1+$/.test(cpf)) {
                            return false;
                        }

                        let soma = 0;
                        for (let i = 0; i < 9; i++) {
                            soma += parseInt(cpf.charAt(i)) * (10 - i);
                        }
                        let resto = soma % 11;
                        let digitoVerificador1 = resto < 2 ? 0 : 11 - resto;

                        soma = 0;
                        for (let i = 0; i < 10; i++) {
                            soma += parseInt(cpf.charAt(i)) * (11 - i);
                        }
                        resto = soma % 11;
                        let digitoVerificador2 = resto < 2 ? 0 : 11 - resto;

                        return (parseInt(cpf.charAt(9)) === digitoVerificador1 && parseInt(cpf.charAt(10)) === digitoVerificador2);
                    }

                    function validarCPF() {
                        const cpfInput = document.getElementById("cpf");
                        const resultadoDiv = document.getElementById("resultado");

                        const cpf = cpfInput.value;

                        if (validaCPF(cpf)) {
                            resultadoDiv.textContent = "CPF válido";
                        } else {
                            resultadoDiv.textContent = "CPF inválido";
                        }
                    }
                </script> -->
            </fieldset>
            <fieldset class="contatofield">
                <legend>Contato</legend>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" class="email" name="email" required data-mask="A@A.A" value="{{isset($formulario->email) ? $formulario->email : old('email')}}">
                        <script>
                            function validateEmail(email) {
                                const emailInput = document.getElementById("email");
                                const errorDiv = document.getElementById("email-error");
                                const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

                                if (emailRegex.test(email)) {
                                    emailInput.style.border = "1px solid #ccc"; // Formato de email válido, remove a borda vermelha.
                                    errorDiv.textContent = "";
                                } else {
                                    emailInput.style.border = "1px solid red"; // Formato de email inválido, destaca em vermelho.
                                    errorDiv.textContent = "Formato de e-mail inválido";
                                }
                            }
                        </script>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" class="telefone" name="phone" value="{{isset($formulario->phone) ? $formulario->phone : old('phone')}}" >
                </div>
            </fieldset>
        </div>

        <div class="right-section">
            <script src ="{{asset ('js/buscar.js')}}"></script>
            <fieldset>
                <legend>Endereço</legend>
                <!-- Seus campos de endereço aqui -->
                <div class="right-section">
                    <div class="form-group">
                        <label for="cep">CEP:</label>
                        <input type="text" class="cep" id="cep" name="cep" onblur="fetchAddress()" maxlenght="8" value="{{isset($formulario->cep) ? $formulario->cep : old('cep')}}">
                    </div>
                    <div class="form-group">
                        <label for="rua">Rua:</label>
                        <input type="text" id="rua" name="street" value="{{isset($formulario->street) ? $formulario->street : old('street')}}">
                    </div>

                    <div class="form-group">
                        <label for="numero">Número:</label>
                        <input type="text" id="numero" name="number" value="{{isset($formulario->number) ? $formulario->number : old('number')}}">
                    </div>

                    <div class="form-group">
                        <label for="bairro">Bairro:</label>
                        <input type="text" id="bairro" name="neighborhood" value="{{isset($formulario->neighborhood) ? $formulario->neighborhood : old('neighborhood')}}">
                    </div>

                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <input type="text" id="cidade" name="city" value="{{isset($formulario->city) ? $formulario->city : old('city')}}">
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <input type="text" id="estado" name="state" value="{{isset($formulario->state) ? $formulario->state : old('state')}}">
                    </div>

                    <div class="form-group">
                        <label for="complemento">Complemento:</label>
                        <input type="text" id="complemento" name="complement" value="{{isset($formulario->complement) ? $formulario->complement : old('complement')}}">
                    </div>
                    <div class="enviar">
                    <button type="submit">Enviar</button>
                    </div>
            </div>
            </fieldset>
        </div>
    </form>
    </form>
</body>
</html>