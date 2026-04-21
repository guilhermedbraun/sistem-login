const nav = document.querySelector(".nav");
const btnMenu = document.querySelector(".btn-menu");
const menu = document.querySelector(".menu");
const section = document.querySelector(".section");

function handleButtonClick(event) {
  if (event.type === "touchstart") event.preventDefault();
  event.stopPropagation();
  nav.classList.toggle("active");
  section.classList.toggle("hidden");
  handleClickOutside(menu, () => {
    nav.classList.remove("active");
    section.classList.remove("hidden");
    setAria();
  });
  setAria();
}

function handleClickOutside(targetElement, callback) {
  const html = document.documentElement;
  function handleHTMLClick(event) {
    if (!targetElement.contains(event.target)) {
      targetElement.removeAttribute("data-target");
      html.removeEventListener("click", handleHTMLClick);
      html.removeEventListener("touchstart", handleHTMLClick);
      callback();
    }
  }
  if (!targetElement.hasAttribute("data-target")) {
    html.addEventListener("click", handleHTMLClick);
    html.addEventListener("touchstart", handleHTMLClick);
    targetElement.setAttribute("data-target", "");
  }
}

function setAria() {
  const isActive = nav.classList.contains("active");
  btnMenu.setAttribute("aria-expanded", isActive);
  if (isActive) {
    btnMenu.setAttribute("aria-label", "Fechar Menu");
  } else {
    btnMenu.setAttribute("aria-label", "Abrir Menu");
  }
}

btnMenu.addEventListener("click", handleButtonClick);
btnMenu.addEventListener("touchstart", handleButtonClick);


/* ////////// Submenu Show ////////// */

function dropA() {
  const submenu1 = document.querySelector('#submenu1')
  const submenu2 = document.querySelector('#submenu2')
  const submenu3 = document.querySelector('#submenu3')

  if (submenu1.classList.contains('open')) {
    submenu1.classList.remove('open')
  } else {
    submenu1.classList.add('open')
    submenu2.classList.remove('open')
    submenu3.classList.remove('open')
  }
}
function dropB() {
  const submenu2 = document.querySelector('#submenu2')
  const submenu1 = document.querySelector('#submenu1')
  const submenu3 = document.querySelector('#submenu3')

  if (submenu2.classList.contains('open')) {
    submenu2.classList.remove('open')
  } else {
    submenu2.classList.add('open')
    submenu1.classList.remove('open')
    submenu3.classList.remove('open')
  }
}
function dropC() {
  const submenu3 = document.querySelector('#submenu3')
  const submenu2 = document.querySelector('#submenu2')
  const submenu1 = document.querySelector('#submenu1')
  if (submenu3.classList.contains('open')) {
    submenu3.classList.remove('open')
  } else {
    submenu3.classList.add('open')
    submenu1.classList.remove('open')
    submenu2.classList.remove('open')
  }
}

/* //////// setas do submenu //////// */

const subv1 = document.querySelector('.subv1')

subv1.addEventListener('click', () => {
  subv1.classList.toggle('ativo')
  subv2.classList.remove('ativo')
  subv3.classList.remove('ativo')
})

const subv2 = document.querySelector('.subv2')

subv2.addEventListener('click', () => {
  subv2.classList.toggle('ativo')
  subv1.classList.remove('ativo')
  subv3.classList.remove('ativo')
})

const subv3 = document.querySelector('.subv3')

subv3.addEventListener('click', () => {
  subv3.classList.toggle('ativo')
  subv1.classList.remove('ativo')
  subv2.classList.remove('ativo')
})

/* /////////// Toggle Mode ////////// */
function darkmode() {
  var SetTheme = document.body;
  SetTheme.classList.toggle("dark-mode");
  var theme;

  if (SetTheme.classList.contains("dark-mode")) {
      console.log("Dark mode");
      theme = "DARK";
  } else {
      console.log("Light mode");
      theme = "LIGHT";
  }
  localStorage.setItem("PageTheme", JSON.stringify(theme));
}

function applyTheme() {
  let GetTheme = JSON.parse(localStorage.getItem("PageTheme"));
  console.log(GetTheme);
  if (GetTheme === "DARK") {
      document.body.classList.add("dark-mode");
      localStorage.setItem("tema", JSON.stringify('dark-mode'));
  } else {
      document.body.classList.remove("dark-mode");
      localStorage.setItem("tema", JSON.stringify('default'));
  }
}

applyTheme();

function setTema(tipo) {
  if (tipo == "dark-mode") {
      localStorage.setItem("PageTheme", JSON.stringify("DARK"));
  } else {
      localStorage.setItem("PageTheme", JSON.stringify("LIGHT"));
  }

  applyTheme();
}