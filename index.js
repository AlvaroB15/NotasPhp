    
// // console.log('<?php echo $start_script?>;');

// $(document).ready(function () {
//     console.log("Estoy en JS");
//     console.log("JQuery esta trabajando");

//     let bandera = false;

//     // Hacemos JQuery para el elemento con el id 'task-form'
//     $('#task-form').submit(function(e){
//         bandera = true;
        
//         require('dotenv').config();
        
//         const accountSid = process.env.ACCOUNT_SID;
//         const authToken = process.env.AUTH_TOKEN;
    
//         const client = require('twilio')(accountSid,authToken);
    
//         client.messages.create({
//             to : process.env.MY_PHONE_NUMBER,
//             from : '+19382010608',
//             body: '      Mande Mensaje ?>'
//         })
//             .then(message=>console.log(message.sid));
               
//     });
// });









// $(document).ready(function(){
//     // console.log("Cargue");

//     $(document).on('click','.tarea-eliminar', function(){
//         // console.log('HICE CLICK');
//         if(confirm("Esta seguro de eliminar esta tarea? ")){
//             let element = $(this)[0].parentElement.parentElement;
//             let id = $(element).attr('obtenerId');

//             $.post('eliminarTarea.php', {id}, function(response){
//             console.log(response);
//             mostrarTareas();
//         });
//         }

//         // console.log(id); 
//     });


// });







     
$(document).ready(function(){     
    $("#btn1").click(function(){
        $('#modal1').modal('show');//básico           
    });
    
    $("#btn2").click(function(){
        $('#modal2').modal('show');
        $('#modal2').draggable({}); //arrastrable        
    });
    
        
     $("#btn3").click(function(){
        $('#modal3').modal('show');	       
    });
    
     $("#btn_hide").click(function(){
        $('#modal_custom').modal('hide');	         
    });
     
    
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var recipient = button.data('whatever') 
      var modal = $(this)
      modal.find('.modal-title').text('New message to ' + recipient)
      modal.find('.modal-body input').val(recipient)
    })
    
    $("#btn_custom").click(function(){
        $("#modal_custom").find(".modal-header").css("background", "linear-gradient(to left, #f5af19, #f12711)");
        $("#modal_custom").find(".modal-header").css("color", "white");
        $("#modal_custom").find(".modal-title").text("Ejemplo en vivo de cambio de título");    
        $('#modal_custom').modal('show');
    });
});   