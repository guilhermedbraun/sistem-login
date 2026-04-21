//////// Pesquisa Dashboard ////////
var search = document.getElementById('pesquisar');

search.addEventListener("keydown", function(event) {
    if (event.key === "Enter") 
    {
        searchData();
    }
});

function searchData()
{
    window.location = '../financeiro/index.php?search='+search.value;
}

(function () {
    var decodeHtmlEntity = function(str) {
       var txt = document.createElement("textarea");
       txt.innerHTML = str;
       return txt.value;
    };
 
    var handleTableSort = function() {
       var table = document.querySelector('.table');
       var headers = table.querySelectorAll('th[scope="col"] a');
       
       headers.forEach(function(header) {
          header.addEventListener('click', function() {
             var rows = Array.from(table.querySelectorAll('tbody tr'));
             var columnIndex = Array.from(header.parentNode.parentNode.children).indexOf(header.parentNode);
             var dataType = header.getAttribute('data-type') || ''; // adicionado suporte para tipos de dados numéricos
             var order = (header.getAttribute('data-order') || 'asc').toLowerCase();
             
             rows.sort(function(a, b) {
                var valueA = decodeHtmlEntity(a.children[columnIndex].innerText);
                var valueB = decodeHtmlEntity(b.children[columnIndex].innerText);
                
                if(dataType === 'numeric') {
                   valueA = parseFloat(valueA.replace(',', '.'));
                   valueB = parseFloat(valueB.replace(',', '.'));
                }
                
                if(valueA < valueB) {
                   return order === 'asc' ? -1 : 1;
                }
                
                if(valueA > valueB) {
                   return order === 'asc' ? 1 : -1;
                }
                
                return 0;
             });
             
             rows.forEach(function(row) {
                row.parentNode.appendChild(row);
             });
             
             header.setAttribute('data-order', order === 'asc' ? 'desc' : 'asc');
          });
       });
    };
 
    handleTableSort();
 })();