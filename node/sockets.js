"use strict"


module.exports = (socket, io) => {
    console.log('Connected!');

    socket.on('newOnline', () => {
        const text = {text : 'Новый пользователь онлайн'};
        io.emit('newOnline', text);
    }) 
    
    socket.on('serv', (msg) => {
        io.emit('client', msg);
    });

    socket.on('disconnect', () => {
        console.log('Disconnected');

        const text = {text : 'Пользователь вышел'};
        io.emit('offline', text); 
    })
}