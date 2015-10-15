<html>
<head>
    <title>Socket.IO chat</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font: 13px Helvetica, Arial; }
        form { background: #000; padding: 3px; position: fixed; bottom: 0; width: 100%; }
        form input { border: 0; padding: 10px; width: 90%; margin-right: .5%; }
        form button { width: 9%; background: rgb(130, 224, 255); border: none; padding: 10px; }
        #messages { list-style-type: none; margin: 0; padding: 0; }
        #messages li { padding: 5px 10px; }
        #messages li:nth-child(odd) { background: #eee; }
    </style>
</head>
<body>
<ul id="messages"></ul>
<form action="fire" method="POST" name="form1" id="form1">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input id="m" name="m" autocomplete="off" />
    <button>Send</button>
</form>

<script src="{{ asset('js/jquery-2.1.3.js') }}"></script>
<script src="{{ asset('node_modules/socket.io/node_modules/socket.io-client/socket.io.js') }}"></script>

<script>
    $(document).ready(function(){

        var domain = window.location.href.split("/")[window.location.href.split("/").length - 1];

        var profile = {
            id        : "",
            firstName : "",
            lastName  : "",
            photo     : "",
            room      : "",
            key       : ""
        };

        var socket_connect = function (room) {
            return io(window.location.origin + ':6001', {
                query: { 'r_var' : room, 'key' : "somekey" }
            });
        };

        var socket      = socket_connect(domain);
        socket.on("test-channel:App\\Events\\TestEvents", function(message){
            $("#messages").append('<li><b>' + message.data.from + '</b>: ' + message.data.m + '</li>');
        });
        socket.on("alert", function(message){
            $("#messages").append('<li>' + message.m + '</li>');
        });

        $('#form1').submit(function(event) {

            var formData = {
                '_token'              : $('input[name=_token]').val(),
                'm'              : $('input[name=m]').val()
            };
            $.ajax({
                type        : 'POST',
                url         : '/fire/' + domain,
                data        : formData,
                dataType    : 'json',
                encode          : true
            })
                .done(function(data) {
                    // log data to the console so we can see
                    console.log(data);
                    $('#m').val('');
                    // here we will handle errors and validation messages
                });
            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
        });

    });
</script>

</body>
</html>