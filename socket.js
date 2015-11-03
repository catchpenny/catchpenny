var app = require('http').createServer(handler);
var io = require('socket.io')(app);
var Redis = require('ioredis');
var redis = new Redis();
//var jwt = require('jsonwebtoken');
//var colors = require('colors');

app.listen(6001, function() {
    console.log('Server is running!');
});

function handler(req, res) {
    res.writeHead(200);
    res.end('');
}

var domain = "";
var channel= "";
var users = {};

//io.set('authorization', function (handshakeData, accept) {
//    var domain = handshakeData.headers.referer.replace('http://','').replace('https://','').split(/[/?#]/)[0];
//    var token = handshakeData._query.jwttoken;
//    var decoded = '';
//    try {
//        decoded = jwt.verify(token, 'Dca3jBi7K302m4qWTMqOlwnVhKWSdmAZ', {ignoreExpiration: true});
//    } catch(e){
//        console.log(e);
//    }
//    // check if channel and domain are same
//    if('catchpenny'==domain)
//        accept(null, true);
//    else
//        return accept('Deny', false);
//});

io.on('connection', function(socket) {

    domain = socket.handshake['query']['domain'];
    channel = socket.handshake['query']['channel'];
    // save user
    socket.join(domain);
    var data = { 'm' : "a user connected" };
    socket.to(domain).emit("alert",data);
    console.log((socket.id + ' ->user joined room #'+domain));
    //console.log((socket.id + ' ->user joined room #'+domain).green);

    socket.on('disconnect', function(){
        socket.leave(domain);
        var data = { 'm' : "a user disconnected" };
        socket.to(domain).emit("alert",data);
        console.log((socket.id + ' ->user left room #'+domain));
        //console.log((socket.id + ' ->user left room #'+domain).red);
    });
});

redis.psubscribe('*', function(err, count) {
    //
});

redis.on('pmessage', function(subscribed, local_channel, message) {
    message = JSON.parse(message);
    io.to(message.data.data.domain).emit(local_channel + ':' + message.event+'\\'+channel, message.data);
});

/*
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('test-channel', function(err, count) {

});

redis.on('message', function(channel, message) {
    console.log('Message Recieved: ' + message);
    message = JSON.parse(message);

    io.emit(channel + ':' + message.event, message.data);
});


http.listen(3000, function(){
    console.log('Listening on Port 3000');
});
*/