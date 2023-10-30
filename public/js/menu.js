function toggleMenu() {
    var menu = document.querySelector(".menu");
    var table = document.querySelector("table.menu-open"); // Selecione a tabela com a classe "menu-open"
    
    menu.classList.toggle("open");
    
    if (menu.classList.contains("open")) {
        table.style.marginLeft = "200px"; // Ajuste a margem esquerda quando o menu estiver aberto
    } else {
        table.style.marginLeft = "0"; // Reverta a margem esquerda quando o menu estiver fechado
    }
}
