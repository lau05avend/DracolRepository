
const lista = document.getElementById('lista');
const listaLeft = document.getElementById('lista-left');
const listaCenter = document.getElementById('lista-center');
const listaRight = document.getElementById('lista-right');

function setupStore() {
    if (localStorage) {  // basic localStorage check: (typeof (localStorage) !== "undefined")
        return {
            get: getValue,
            set: setValue
        }
    };
    return {};
}

function getValue(sortable) {    //obtener el orden de la lista
    var order = localStorage.getItem(sortable.options.category);
    return order ? order.split('|') : [];     //separa la cadena de texto a array
}

function setValue(sortable) {   //guardar orden de elementos en localstorage
    var order = sortable.toArray();     // transformar cada elemento en un arreglo
    localStorage.setItem(sortable.options.category, order.join('|'));
}
function applyState($section, categoryName) {
    if (localStorage) {
        var order = localStorage.getItem(categoryName);
        var itemIds = order ? order.split('|') : [];
        var $items = itemIds.map(function (itemId, index) {
            return $("[data-id='" + itemId + "'");
        });
        $section.append($items);
    }
}
applyState($("#lista-left"), "left_column");
applyState($("#lista-center"), "center_column");
applyState($("#lista-right"), "right_column");
// initialize sortable


Sortable.create(listaLeft, {
    group: 'shared', // set both lists to same group
    animation: 160,
    chosenClass: "selected",   //establecer nombre de clase para estilos de seleccion
    // ghostClass: "fantasma"
    dragClass: "drag",
    category: "left_column",
    onEnd: () => {   //se ejecuta cuando el usuario suelta el div
        console.log('se inserto un elemento');
    },
    store: setupStore()
});

Sortable.create(listaCenter, {
    group: 'shared', // set both lists to same group
    animation: 160,
    chosenClass: "selected",
    dragClass: "drag",
    category: "center_column",
    store: setupStore()
});

Sortable.create(listaRight, {
    group: 'shared', // set both lists to same group
    animation: 160,
    // handle: '.img-drag',
    chosenClass: "selected",
    dragClass: "drag",
    category: "right_column",
    store: setupStore()
});


$(document).ready(function(){
    $('.view_data').click(function(){
      var student_id = $($this).attr("id");
      $.ajax({
        url:'estadoactividad/{estadoactividad}/edit',
        method:"put",
        data:{student_id:NombreEstado},
        success:function(){
        //   $('student_detail').html(data);
          $('#dataModal').modal("show");
        }
      });

    });
});


$('#exampleModal').on('show.bs.modal', function (event) {
    alert('god');
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })

