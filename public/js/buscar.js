async function fetchAddress() {
    const cepInput = document.getElementById("cep");
    const ruaInput = document.getElementById("rua");
    const bairroInput = document.getElementById("bairro");
    const cidadeInput = document.getElementById("cidade");
    const estadoInput = document.getElementById("estado");

    const cep = cepInput.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    // if (cep.length !== 8) {
    //     alert("CEP inválido");
    //     return;
    // }

    try {
        const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        const data = await response.json();

        if (data.erro) {
            alert("CEP não encontrado");
        } else {
            ruaInput.value = data.logradouro;
            bairroInput.value = data.bairro;
            cidadeInput.value = data.localidade;
            estadoInput.value = data.uf;
        }
    } catch (error) {
        console.error(error);
    }
}
