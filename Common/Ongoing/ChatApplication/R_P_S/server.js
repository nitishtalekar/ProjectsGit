const path = require('path');
const http = require('http');
const express = require('express');
const socketio = require('socket.io');
const session = require('express-session');
const bodyParser = require('body-parser');
const mysql = require('mysql');
// const formatMessage = require('./utils/messages');
// const formatMessageArr = require('./utils/messages');
const {
  formatMessage,
  formatMessageArr
} = require('./utils/messages');
const {
  userJoin,
  getCurrentUser,
  userLeave,
  getRoomUsers
} = require('./utils/users');
const {
  userJoinGame,
  getCurrentUserGame,
  userLeaveGame,
  getRoomUsersGame
} = require('./utils/games');
const {
  startGame,
  addChoice,
  getChoiceList,
  clearChoices
} = require('./utils/gaming');


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

function cscore(score, choice, list){
  console.log(score);
  var i;
  if(choice == "rock"){
    for(i=0;i<list.length;i++){
      var s = list[i].split("||");
      var usr = getCurrentUserGame(s[0]);
      var scr = usr.score;
      if(s[1] == "paper"){
        scr = scr + 1;
        usr.score = scr;
      }

    }
  }

  if(choice == "paper"){
    for(i=0;i<list.length;i++){
      var s = list[i].split("||");
      var usr = getCurrentUserGame(s[0]);
      var scr = usr.score;
      if(s[1] == "scissor"){
        scr = scr + 1;
        usr.score = scr;
      }

    }
  }

  if(choice == "scissor"){
    for(i=0;i<list.length;i++){
      var s = list[i].split("||");
      var usr = getCurrentUserGame(s[0]);
      var scr = usr.score;
      if(s[1] == "rock"){
        scr = scr + 1;
        usr.score = scr;
      }

    }
  }

}

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
    // console.log(socket.id, username, room);
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


  socket.on('joinRoomGame', ({ username, game }) => {
    // console.log(socket.id, username, game);
    console.log("Join Game");
    console.log(socket.id);

    const user = userJoinGame(socket.id, username, game, 0);

    console.log(user);

    if (user === 0){
      const destination = '/index.html?error=duplicate';
      socket.emit('redirect', destination);
    }
    else{


      socket.join(user.game);

      // Welcome current user
      socket.emit('message', formatMessage('Welcome', 'Welcome to the Game!'));

      // Broadcast when a user connects
      socket.broadcast
        .to(user.game)
        .emit(
          'message',
          formatMessage('Joined', `${user.username} has joined the chat`)
        );

      // Send users and room info
      io.to(user.game).emit('gameUsers', {
        game: user.game,
        users: getRoomUsersGame(user.game)
      });
    }


  });




  // OLD

  // socket.on('joinGameRoom', ({ username, gameroom }) => {
  //   console.log(socket.id, username, gameroom);
  //
  //   const user = getCurrentUser(socket.id);
  //
  //   console.log("YAHA SE NAYA SCENE CHALU -------");
  //   console.log(user);
  //   // const user = userJoinGame(socket.id, game);
  //
  //   if (user === 0){
  //     const destination = '/index.html?error=duplicate';
  //     socket.emit('redirect', destination);
  //   }
  //   else{
  //
  //     // const players = io.sockets.clients(user.game);
  //     // console.log(players);
  //
  //     // if(players > 0){
  //     //   const destination = '/index.html?error=duplicate';
  //     //   socket.emit('redirect', destination);
  //     // }
  //     // else{
  //       const user = userJoinGame(socket.id, gameroom);
  //
  //       socket.join(user.game);
  //
  //       // Welcome current user
  //       socket.emit('message', formatMessage('Welcome', 'Welcome to the Chatroom!'));
  //
  //       // Broadcast when a user connects
  //       socket.broadcast
  //         .to(user.game)
  //         .emit(
  //           'message',
  //           formatMessage('Joined', `${user.username} has joined the chat`)
  //         );
  //
  //       // Send users and room info
  //       io.to(user.room).emit('roomUsers', {
  //         room: user.game,
  //         users: getRoomUsers(user.game)
  //       });
  //     // }
  //
  //
  //   }
  //
  //
  // });



  socket.on('start', ({username, room, roomname}) => {

    // console.log(username, room ,roomname);
    const user = getCurrentUser(socket.id);
    const str1 = 'game.html?username=';
    const str2 = '&game=';
    const str3 = 'game&roomname=';
    const redirect_str = str1 + username + str2 + room + str3 + roomname;
    // console.log(redirect_str);
    // console.log("started");

    const gameroom = room+"game";
    const playroom = getRoomUsersGame(gameroom);
    const players = playroom.length;

    console.log("No of players");
    console.log(players);

    if(players>0){
      socket.emit('message', formatMessage('Welcome', 'Sorry A Game is already Going on!'));
    }
    else{

      const gaming = startGame(gameroom);
      // console.log("HERE");
      //
      console.log(gaming);
      // console.log(games_online);

      socket.broadcast
        .to(user.room)
        .emit(
          'game', {
            id: room,
            room: roomname
          });
        socket.emit('redirect', redirect_str);
    }

  });

  // Listen for chatMessage
  socket.on('chatMessage', msg => {
    const user = getCurrentUser(socket.id);
    io.to(user.room).emit('message', formatMessage(user.username, msg));
  });

  socket.on('gameMessage', msg => {

    const user = getCurrentUserGame(socket.id);

    io.to(user.game).emit('message', formatMessage(user.username, msg));

  });

  socket.on('gameChoice', msg => {
    const user = getCurrentUserGame(socket.id);
    const gameRoom = getRoomUsersGame(user.game);
    const players = gameRoom.length;

    console.log("GAMING", msg, user, socket.id);

    const chList = getChoiceList(user.game);
    console.log(chList);
    const userChoice = socket.id + "||" + msg;
    console.log(userChoice);
    // console.log(games_online);

    // const gaming = games_online.find(gaming => gaming.gameroom === user.game);
    // const num_choice = gaming.choices.length;

    addChoice(user.game , userChoice);
    console.log("ADDED");

    if(chList.length === players){
      console.log("DISPLAY");
      var i;
      const dispChoice = [];
      var dispScore = "";
      for(i=0;i<chList.length;i++)
      {
        var s = chList[i].split("||");
        var usr = getCurrentUserGame(s[0]);
        dispScore = dispScore + usr.username + ": ";
        console.log(usr.score);
        cscore(usr.score, s[1], chList);
        var x = formatMessage(usr.username, s[1]);
        console.log("yoyoy"+usr.score);
        dispScore = dispScore + usr.score + " ";
        dispChoice.push(x);
      }
      io.to(user.game).emit('message', formatMessageArr('Welcome', dispScore));
      io.to(user.game).emit('messageScore', dispChoice);
      // io.to(user.game).emit('enable');
      clearChoices(user.game);


    }
    // else{
    //   console.log("Else");
    //
    // }


    // console.log("moshi moshi");

    // io.to(user.room).emit('message', formatMessage(user.username, msg));
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
        const str1 = 'chatbox.html?username=';
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
