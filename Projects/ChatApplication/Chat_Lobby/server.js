const path = require('path');
const http = require('http');
const express = require('express');
const socketio = require('socket.io');
const session = require('express-session');
const bodyParser = require('body-parser');
const mysql = require('mysql');
const formatMessage = require('./utils/messages');
const {
  userJoin,
  getCurrentUser,
  userLeave,
  getRoomUsers
} = require('./utils/users');

const con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "chat"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
});

const app = express();

app.use(session({
	secret: 'secret',
	resave: true,
	saveUninitialized: true
}));
app.use(bodyParser.urlencoded({extended : true}));
app.use(bodyParser.json());

const server = http.createServer(app);
const io = socketio(server);

// Set static folder
app.use(express.static(path.join(__dirname, 'public')));

// const botName = 'Admin';

// Run when client connects
io.on('connection', socket => {
  socket.on('joinRoom', ({ username, room }) => {
    console.log(socket.id, username, room);
    const user = userJoin(socket.id, username, room);

    if (user === 0){
      const destination = '/index.html?error=duplicate';
      socket.emit('redirect', destination);
    }
    else{
      socket.join(user.room);

      // Welcome current user
      socket.emit('message', formatMessage('Welcome', 'Welcome to the Chatroom!'));

      // Broadcast when a user connects
      socket.broadcast
        .to(user.room)
        .emit(
          'message',
          formatMessage('Joined', `${user.username} has joined the chat`)
        );

      // Send users and room info
      io.to(user.room).emit('roomUsers', {
        room: user.room,
        users: getRoomUsers(user.room)
      });
    }


  });

  socket.on('start', ({username, room, roomname}) => {
    const user = getCurrentUser(socket.id);
    const str1 = 'chatbox.html?username=';
    const str2 = '&room=';
    const str3 = '&roomname=';
    const redirect_str = str1 + username + str2 + room + str3 + roomname;
    console.log(redirect_str);
    console.log("startes");
    socket.broadcast
      .to(user.room)
      .emit(
        'chat', {
          id: room,
          room: roomname
        });
      socket.emit('redirect', redirect_str);

  });

  // Listen for chatMessage
  socket.on('chatMessage', msg => {
    const user = getCurrentUser(socket.id);

    io.to(user.room).emit('message', formatMessage(user.username, msg));
  });

  // Runs when client disconnects
  socket.on('disconnect', () => {
    const user = userLeave(socket.id);

    if (user) {
      io.to(user.room).emit(
        'message',
        formatMessage('Left', `${user.username} has left the chat`)
      );

      // Send users and room info
      io.to(user.room).emit('roomUsers', {
        room: user.room,
        users: getRoomUsers(user.room)
      });
    }
  });
});

app.post('/login', function(request, response) {
	const room = request.body.room;
	const password = request.body.password;
  const usernamefull = request.body.username;
  const usernamelow = usernamefull.trim().toLowerCase();
  const username = usernamelow.replace(/\s+/g, '');
	if (room && password) {
		con.query('SELECT * FROM rooms WHERE room_name = ? AND room_password = ?', [room, password], function(error, results, fields) {
			if (results.length > 0) {
				request.session.loggedin = true;
				request.session.username = username;
        // const str1 = 'chatbox.html?username=';
        const str1 = 'lobby.html?username=';
        const str2 = '&room=';
        const str3 = '&roomname=';
        const redirect_str = str1 + username + str2 + results[0].room_id + str3 + results[0].room_name;
        // console.log(redirect_str);
				response.redirect(redirect_str);
			} else {
				response.redirect('index.html?error=wrong');
			}
			response.end();
		});
	} else {
		response.send('Please enter Username and Password!');
		response.end();
	}
});

app.post('/roomcreate', function(request, response) {
	const roomname = request.body.create_room;
	const password = request.body.create_password;
	const cpassword = request.body.confirm_password;
	if (password === cpassword) {

    // Check if room exists
    con.query('SELECT * FROM rooms WHERE room_name = ? AND room_password = ?', [roomname, password], function(error, results, fields) {
			if (results.length > 0) {
        response.redirect('index.html?create=false2');
        response.end();
			} else {

        con.query('INSERT INTO rooms (room_name, room_password) VALUES (?,?)', [roomname, password], function (err, result) {
          if (err) throw err;
          response.redirect('index.html?create=true');
          response.end();
        });
			}

		});

	} else {
		response.redirect('index.html?create=false1');
		response.end();
	}
});

const PORT = process.env.PORT || 3000;

server.listen(PORT, () => console.log(`Server running on port ${PORT}`));
