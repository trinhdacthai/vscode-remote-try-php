// const Redis = require("ioredis");
var io = require('socket.io')(6001,
    {
        cors: {
            origin: "*",
            methods: ["GET", "POST"]
        }});

io.on('error',function(socket){
    console.log('lỗi');
});

io.on('connection',function(socket){
    console.log('có người vừa kết nối'+socket.id) ;

    socket.on('chat', (msg) => {
        console.log('message gui den server: ' + msg);
        io.emit('chat-client', msg);
    });

});
//
// var Redis = require('ioredis')
// var redis = new Redis(1000)
// redis.on('chat',function (partner,channel,message){
//     message = JSON.parse(message)
//     io.emit(channel+":"+message.event,message.data.message);
//     console.log('send');
// });
