    
// console.log('<?php echo $start_script?>;');

$(document).ready(function () {
    console.log("Estoy en JS");
    console.log("JQuery esta trabajando");

    let bandera = false;

    // Hacemos JQuery para el elemento con el id 'task-form'
    $('#task-form').submit(function(e){
        bandera = true;
        
        require('dotenv').config();
        
        const accountSid = process.env.ACCOUNT_SID;
        const authToken = process.env.AUTH_TOKEN;
    
        const client = require('twilio')(accountSid,authToken);
    
        client.messages.create({
            to : process.env.MY_PHONE_NUMBER,
            from : '+19382010608',
            body: '      Mande Mensaje ?>'
        })
            .then(message=>console.log(message.sid));
               
    });
});
