const aulas = document.querySelectorAll('.aula');


aulas.forEach((aula) => {
    aula.addEventListener('mouseenter', () => {

        if(window.innerWidth < 450) {
            window.scrollTo({top: 0, behavior: 'smooth'});
        }

        removerSelecaoDoaula();

        aula.classList.add('selecionado');

        alterarImagemaulaSelecionado(aula);

        alterarNomeaulaSelecionado(aula);

        alterarDescricaoaula(aula);
    })
})

function alterarDescricaoaula(aula) {
    const descricaoaula = document.getElementById('descricao-aula');
    descricaoaula.innerText = aula.getAttribute('data-description');
}

function alterarNomeaulaSelecionado(aula) {
    const nomeaula = document.getElementById('nome-aula');
    nomeaula.innerText = aula.getAttribute('data-name');
}

function alterarImagemaulaSelecionado(aula) {
    const imagemaulaGrande = document.querySelector('.aula-grande');
    const idaula = aula.attributes.id.value;
    imagemaulaGrande.src = `./src/midia/card-${idaula}.mp4`;// add os outros endereços
}

function removerSelecaoDoaula() {
    const aulaSelecionado = document.querySelector('.selecionado');
    aulaSelecionado.classList.remove('selecionado');
}
//////////////////////////////////////////////////////////////////
const botoesTrailer = document.querySelectorAll(".botao-trailer");
const botaoFecharModal = document.querySelector(".fechar-modal");
const videoContainer = document.getElementById("video-container");
const modal = document.querySelector(".modal");

let linkDoVideo = "";

function alternarModal() {
  modal.classList.toggle("aberto");
}

botoesTrailer.forEach((botaoTrailer) => {
  botaoTrailer.addEventListener("click", () => {
    alternarModal();
    linkDoVideo = `./src/midia/${botaoTrailer.id}.mp4`;// add os outros endereços
    carregarVideo(linkDoVideo);
  });
});

botaoFecharModal.addEventListener("click", () => {
  alternarModal();
    linkDoVideo = `./src/midia/#.mp4`;// add os outros endereços
    pararVideo(linkDoVideo);
});

function carregarVideo(src) {
  const video = document.createElement("video");
  video.src = src;
  video.controls = true;
  video.autoplay = true;
  videoContainer.innerHTML = "";
  videoContainer.appendChild(video);
}

function pararVideo() {
    const video = document.getElementById("video");
  if (video) {
    video.pause();
    videoContainer.innerHTML = "";
    video.removeChild(video);
  }
}