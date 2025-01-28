"use strict"

const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
const routes = require('./routes');
const socketHandlers = require('./sockets');

const app = express();
const server = http.createServer(app);
const io = new Server(server);

app.use(express.json());
app.use('/', routes);


io.on('connection', (socket) => {
    socketHandlers(socket, io);
});



server.listen(3000, function(){
    console.log("Listening on port 3000");   
})
