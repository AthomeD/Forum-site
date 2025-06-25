const express = require('express');
const http = require('http');
const socketIo = require('socket.io');
const axios = require('axios'); // Use axios for making HTTP requests to PHP

const app = express();
const server = http.createServer(app);
const io = socketIo(server);

// Serve the HTML page
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
});

// When a client connects
io.on('connection', (socket) => {
    console.log('a user connected');

    // Retrieve the last 10 messages from the PHP backend
    axios.get('http://localhost/get_messages.php')
        .then(response => {
            const messages = response.data;
            // Emit the messages to the client
            socket.emit('previous messages', messages);
        })
        .catch(error => {
            console.error('Error retrieving messages:', error);
        });

    // Listen for chat messages from the client
    socket.on('chat message', (data) => {
        // Save the message to the database using PHP
        axios.post('http://localhost/save_message.php', {
            user: data.user,
            message: data.message
        })
        .then(() => {
            // Broadcast the message to all clients
            io.emit('chat message', data);
        })
        .catch(error => {
            console.error('Error saving message:', error);
        });
    });

    // Handle user disconnect
    socket.on('disconnect', () => {
        console.log('user disconnected');
    });
});

server.listen(3000, () => {
    console.log('Server is listening on port 3000');
});
