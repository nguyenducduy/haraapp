<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
<script type="text/javascript" src="http://haraapp.dev/public/plugins/socket.io-client/socket.io.js"></script>
<script>
$(document).ready(function() {
    var socket = io.connect('http://localhost:3000/', {
        timeout: 3000
    });

    socket.on('connect', function () {
        console.log('connected');
    });

    socket.on('notification', function (message) {
        console.log(message);
    });
})
</script>
<div class="test">
    abc
    
</div>
