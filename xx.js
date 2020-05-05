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