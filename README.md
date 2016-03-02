# haraapp

### PhalconPHP 2.0.8
### PHP 5.5
### Beanstalk Queue
### Redis
### SocketIO 1.x
### NPM module: winston, redis, cookie

- 1. Run redis-server /usr/local/etc/redis.conf

- 2. Run Beanstalk

- 3. Run node server.js

- Login to shop and run URL https://five-devshop.myharavan.com/admin/api/auth/?api_key=2f473d7bb160533c9535985ff068cc56 to install develop version.

- After setup category map has been done. Go to console and type:
    1. php public/index.php worker import
    2. php public/index.php check category (This is a cron task, will be run every 1 minutes)

### Redis die -> Node die
