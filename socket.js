var app = require('http').createServer(handler);
var io = require('socket.io')(app);
var Redis = require('ioredis');
var redis = new Redis();
var jwt = require('jsonwebtoken');
var colors = require('colors');

app.listen(6001, function() {
    console.log('Server is running!');
});

function handler(req, res) {
    res.writeHead(200);
    res.end('');
}

io.on('connection', function(socket) {

    // authenticate and save user
    // get all his domain and channel list join the user into that
    socket.join(socket.handshake['query']['domain']);
    console.log(socket.handshake);

    // inform domain user connected
    //var data = { 'm' : "a user connected" };
    //socket.to(domain).emit("alert",data);


    console.log((socket.id + ' ->user joined domain #' + socket.handshake['query']['domain']).green);

    socket.on('disconnect', function(){
        // inform domain
        //var data = { 'm' : "a user disconnected" };
        //socket.to(domain).emit("alert",data);
        console.log((socket.id + ' ->user left').red);
    });
});



redis.psubscribe('*', function(err, count) {
    //
});

redis.on('pmessage', function(subscribed, local_channel, message) {
    message = JSON.parse(message);
    io.to(message.data.data.domain).emit(local_channel + ':' + message.event+'\\'+message.data.data.channel, message.data);
});
