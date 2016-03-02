var redis    = require('redis').createClient()
  , server   = require('http').createServer()
  , io       = require('socket.io').listen(server)
  , cookie   = require('cookie')
  , logger   = require('winston')
  , sockets  = {};


// Logger config
logger.remove(logger.transports.Console);
logger.add(logger.transports.Console, { colorize: true, timestamp: true });

// run HTTP server on this port
server.listen(3000);

io.of('socket.io').on('connection', function (socket){
    logger.info('> Connected socket ' + socket.id);

    redis.on('message', function (channel, message) {
        logger.info('> ' + channel + ':' + JSON.stringify(message));
        socket.emit(channel, message);
    });

    redis.subscribe('notification');

    socket.on('disconnect', function () {
        logger.info('> Disconnected socket ' + socket.id);
    });
});
