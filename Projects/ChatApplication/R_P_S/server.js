const path = require('path');
const http = require('http');
const express = require('express');
const socketio = require('socket.io');
const session = require('express-session');
const bodyParser = require('body-parser');
const mysql = require('mysql');
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
  clearChoices,
  nextRound
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

function calcScore(choice,chList){
  var i;
  var score = 0;
  const choices = [];
  for(i=0;i<chList.length;i++){
    var ch = chList[i].split("||");
    choices.push(ch[1]);
  }

  if(choice == 'rock'){
    for(i=0;i<choices.length;i++){
      if (choices[i] == 'scissor'){
        score++;
      }
    }  
  }

  if(choice == 'paper'){
    for(i=0;i<choices.length;i++){
      if (choices[i] == 'rock'){
        score++;
      }
    }  
  }

  if(choice == 'scissor'){
    for(i=0;i<choices.length;i++){
      if (choices[i] == 'paper'){
        score++;
      }
    }  
  }

  return score;

}

function compare( a, b ) {
    if ( a.score < b.score ){
      return 1;
    }
    if ( a.score > b.score ){
      return -1;
    }
    return 0;
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
          formatMessage('Joined', `${user.username} has joined the game`)
        );

      // Send users and room info
      io.to(user.game).emit('gameUsers', {
        game: user.game,
        users: getRoomUsersGame(user.game)
      });
    }


  });



  socket.on('start', ({username, room, roomname}) => {
    const user = getCurrentUser(socket.id);
    const str1 = 'game.html?username=';
    const str2 = '&game=';
    const str3 = 'game&roomname=';
    const redirect_str = str1 + username + str2 + room + str3 + roomname;

    const gameroom = room+"game";
    const playroom = getRoomUsersGame(gameroom);
    const players = playroom.length;

    if(players>0){
      socket.emit('message', formatMessage('Sorry', 'Sorry A Game is already Going on!'));
    }
    else{
      const gaming = startGame(gameroom);

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

  socket.on('gameChoice', msg => {
    const user = getCurrentUserGame(socket.id);
    const gameRoom = getRoomUsersGame(user.game);
    const players = gameRoom.length;

    const userChoice = socket.id + "||" + msg;

    addChoice(user.game , userChoice);

    const chList = getChoiceList(user.game);
    
    console.log(chList);

    if(chList.length == players){
      r = nextRound(user.game);
      clearChoices(user.game);
      var i;
      const dispChoice = [];
      var rank = [];
      for(i=0;i<chList.length;i++)
      {
        var s = chList[i].split("||");
        var usr = getCurrentUserGame(s[0]);
        var addScore = calcScore(s[1] , chList);
        usr.score = usr.score + addScore;
        var x = formatMessage(usr.username, s[1]);
        username = usr.username;
        score = usr.score;
        rank.push({username,score});
        dispChoice.push(x);
      }
      
      rank.sort( compare );
        
      io.to(user.game).emit('messageScore', dispChoice);
      var round = "Round: " + r;
      io.to(user.game).emit('FinalScoremessage', formatMessage(round, rank));
      
    }
  });

  // Runs when client disconnects
  socket.on('disconnect', () => {
    const userRoom = userLeave(socket.id);
    const userGame = userLeaveGame(socket.id);

    if (userRoom) {
      io.to(userRoom.room).emit(
        'message',
        formatMessage('Left', `${userRoom.username} has left the chat`)
      );

      // Send users and room info
      io.to(userRoom.room).emit('roomUsers', {
        room: userRoom.room,
        users: getRoomUsers(userRoom.room)
      });
    }
    
    if (userGame) {
      io.to(userGame.game).emit(
        'message',
        formatMessage('Left', `${userGame.username} has left the game`)
      );

      // Send users and room info
      io.to(userGame.game).emit('gameUsers', {
        room: userGame.game,
        users: getRoomUsersGame(userGame.game)
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
