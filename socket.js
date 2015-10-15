var app = require('http').createServer(handler);
var io = require('socket.io')(app);
var Redis = require('ioredis');
var redis = new Redis();

app.listen(6001, function() {
    console.log('Server is running!');
});

function handler(req, res) {
    res.writeHead(200);
    res.end('');
}

var room = "";

io.set('authorization', function (handshakeData, accept) {
    var domain = handshakeData.headers.referer.replace('http://','').replace('https://','').split(/[/?#]/)[0];
    if('myDomain.com'==domain)
        accept(null, true);
    else
        return accept('Deny', false);
});

io.on('connection', function(socket) {

    domain = socket.handshake['query']['var'];
    console.log(socket.handshake);
    socket.join(domain);
    var data = { 'm' : "a user connected" };
    socket.to(domain).emit("alert",data);
    console.log(socket.id + ' ->user joined room #'+domain);

    socket.on('disconnect', function(){
        socket.leave(domain);
        var data = { 'm' : "a user disconnected" };
        socket.to(domain).emit("alert",data);
        console.log(' ->user disconnected id: ' + socket.id);
    });
});

redis.psubscribe('*', function(err, count) {
    //
});

redis.on('pmessage', function(subscribed, channel, message) {
    message = JSON.parse(message);
    //io.emit(channel + ':' + message.event, message.data);
    io.to(message.data.data.room).emit(channel + ':' + message.event, message.data);
});

//var app = require('express')();
//var http = require('http').Server(app);
//var io = require('socket.io')(http);
//var Redis = require('ioredis');
//var redis = new Redis();
//
//redis.subscribe('test-channel', function(err, count) {
//
//});
//
//redis.on('message', function(channel, message) {
//    console.log('Message Recieved: ' + message);
//    message = JSON.parse(message);
//
//    io.emit(channel + ':' + message.event, message.data);
//});
//
//
//http.listen(3000, function(){
//    console.log('Listening on Port 3000');
//});
