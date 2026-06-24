const URL = "http://localhost:8000";
const modalB = document.getElementById("modalCadastro");
const meuModal = new bootstrap.Modal(modalB)
const form = document.getElementById("cadastro");


async function cadastroLivros() {
    try {

        form.setAttribute("action", "/events/create");
        console.log(form.getAttribute("action"));
        document.getElementById("methodField").innerHTML = "";
        document.getElementById("titulo").setAttribute("value", "");
        document.getElementById("autor").setAttribute("value", "");
        document.getElementById("descricao").setAttribute("value", "");
        document.getElementById("paginas").setAttribute("value", "");
        document.getElementById("anoPublicacao").setAttribute("value", "");
        document.getElementById("enviar").innerHTML = "Enviar";
        document.getElementById("staticBackdropLabel").innerHTML = "Cadastrar Livro";
        meuModal.show();
    } catch (error) {
        console.log("Erro: " + Erro)
    }
}

async function modal(id) {
    try {
        let resposta = await fetch(`${URL}/events/edit/${id}`);
        let livro = await resposta.json();
        console.log(livro)
        console.log(livro.titulo)


        form.setAttribute("action", `${URL}/events/update/${id}`);
        console.log(form.getAttribute("action"));
        document.getElementById("methodField").innerHTML = `<input type="hidden" name="_method" value="PUT">`;
        document.getElementById("titulo").setAttribute("value", livro.titulo);
        document.getElementById("autor").setAttribute("value", livro.autor);
        document.getElementById("descricao").innerHTML = livro.descricao;
        document.getElementById("paginas").setAttribute("value", livro.paginas);
        document.getElementById("anoPublicacao").setAttribute("value", livro.anoPublicacao);
        document.getElementById("enviar").innerHTML = "Actualizar";
        document.getElementById("staticBackdropLabel").innerHTML = "Editar Livro";

        meuModal.show();
    } catch (error) {
        console.log("Erro:" + error)
    }
}

window.addEventListener("scroll", function () {

    if (window.scrollY > 0) {
        document.querySelector("#navbar").style.backgroundColor = "rgb(0, 0, 255, 0)";
        document.querySelector("#logo-part-name").style.backgroundColor = "black";
        this.document.querySelectorAll(".nav-link").forEach(link => {
            link.classList.remove("text-white");
        })
        console.log("está a baixar")
    } else {
        document.querySelector("#navbar").style.backgroundColor = "rga(0, 0, 255, 0)";
        document.querySelector("#logo-part-name").style.backgroundColor = "blue";
        this.document.querySelectorAll(".nav-link").forEach(link => {
            link.classList.add("text-white");
        })
        console.log("está no topo")
    }
})