const rock = document.getElementById('rock-form');
const paper = document.getElementById('paper-form');
const scissor = document.getElementById('scissor-form');
const chatMessages = document.querySelector('.chat-messages');
const roomName = document.getElementById('room-name');
const userList = document.getElementById('users');
const uname = document.getElementById('uname');

// Get username and room from URL
const { username, game, roomname } = Qs.parse(location.search, {
  ignoreQueryPrefix: true
});

console.log(username, game, roomname);

uname.innerHTML= `${username}`;
roomName.innerHTML= `${roomname}`;

function leaveGame(){
  const str1 = 'chatbox.html?username=';
  const str2 = '&room=';
  const str3 = '&roomname=';
  var room = game.substring(0, game.length - 4);
  const redirect_str = str1 + username + str2 + room + str3 + roomname;
  window.location.href = redirect_str;
}

const socket = io();

// Join chatroom
socket.emit('joinRoomGame', { username, game });

// Get room and users
socket.on('gameUsers', ({ game, users }) => {
  outputRoomName(roomname);
  outputUsers(users);
});

socket.on('redirect', function(destination) {
    window.location.href = destination;
});

// Message from server
socket.on('message', message => {
  console.log(message);
  outputMessage(message);
  // Scroll down
  chatMessages.scrollTop = chatMessages.scrollHeight;
});

socket.on('messageScore', messageS => {
  console.log(messageS);
  var i ;
  for(i=0;i<messageS.length;i++)
  {
      outputMessage(messageS[i]);
  }
  // Scroll down
  chatMessages.scrollTop = chatMessages.scrollHeight;
});

socket.on('FinalScoremessage', fmessage => {
  console.log(fmessage);
  outputMessageScore(fmessage);

  // Scroll down
  chatMessages.scrollTop = chatMessages.scrollHeight;
});

socket.on('eButton', e => {
  console.log(e);
});

// Message submit
rock.addEventListener('submit', e => {
  e.preventDefault();
  console.log("rock");
  disableButtons();
  // Get message text
  const msg = "rock";
  socket.emit('gameChoice', msg);
});

paper.addEventListener('submit', e => {
  e.preventDefault();
  console.log("paper");
  disableButtons();
  // Get message text
  const msg = "paper";
  socket.emit('gameChoice', msg);
});

scissor.addEventListener('submit', e => {
  e.preventDefault();
  console.log("scissor");
  disableButtons();
  // Get message text
  const msg = "scissor";
  socket.emit('gameChoice', msg);
});

// Output message to DOM
function outputMessage(message) {

  const div = document.createElement('div');
  div.classList.add('msg');

  if( message.username === username ){
    
    if(message.text == 'rock'){
      textbreak = "<i class='fa fa-hand-rock-o' aria-hidden='true'></i> &nbsp; &nbsp; " + message.text;
    }
    if(message.text == 'paper'){
      textbreak = "<i class='fa fa-hand-paper-o' aria-hidden='true'></i> &nbsp; &nbsp; " + message.text;
    }
    if(message.text == 'scissor'){
      textbreak = "<i class='fa fa-hand-scissors-o' aria-hidden='true'></i> &nbsp; &nbsp; " + message.text;
    }
    // textbreak = message.text.replace(/\n/g, '<br>\n');
    div.innerHTML = `<div class="message-data align-right fade-in-message">
        <span class="message-data-name" >${message.time}</span> &nbsp; &nbsp;
        <span class="message-data-time" >Me</span> <i class="fa fa-circle me"></i>
      </div>
      <div class="d-flex justify-content-end fade-in-message">
        <div class="message other-message text-right font-weight-bold text-uppercase">
          ${textbreak}
        </div>
      </div>`;
  }
  else if(message.username === 'Welcome'){
    div.innerHTML = `<div class="d-flex justify-content-center fade-in-message">
      <div class="text-head text-capitalize">
        <i class="fa fa-handshake-o me" aria-hidden="true"></i> ${message.time} &nbsp;&nbsp; ${message.text}
      </div>
    </div>`;
  }
  else if(message.username === 'Left'){
    div.innerHTML = `<div class="d-flex justify-content-center fade-in-message">
      <div class="text-head text-capitalize">
          <i class="fa fa-sign-out me" aria-hidden="true"></i> ${message.time} &nbsp;&nbsp; ${message.text}
      </div>
    </div>`;
  }
  else if(message.username === 'Joined'){
    div.innerHTML = `<div class="d-flex justify-content-center fade-in-message">
      <div class="text-head text-capitalize">
        <i class="fa fa-sign-in me" aria-hidden="true"></i> ${message.time} &nbsp;&nbsp; ${message.text}
      </div>
    </div>`;
  }
  else{
    if(message.text == 'rock'){
      textbreak = "<i class='fa fa-hand-rock-o' aria-hidden='true'></i> &nbsp; &nbsp; " + message.text;
    }
    if(message.text == 'paper'){
      textbreak = "<i class='fa fa-hand-paper-o' aria-hidden='true'></i> &nbsp; &nbsp; " + message.text;
    }
    if(message.text == 'scissor'){
      textbreak = "<i class='fa fa-hand-scissors-o' aria-hidden='true'></i> &nbsp; &nbsp; " + message.text;
    }
    // textbreak = message.text.replace(/\n/g, '<br>\n');
    div.innerHTML = `<div class="message-data align-left fade-in-message">
      <span class="message-data-time text-capitalize" ><i class="fa fa-circle-thin me" aria-hidden="true"></i> ${message.username}</span> &nbsp; &nbsp;
      <span class="message-data-name" >${message.time}</span>
    </div>
    <div class="d-flex justify-content-start fade-in-message">
      <div class="message my-message text-left text-uppercase">
        ${textbreak}
      </div>
    </div>`;
  }

  document.querySelector('.chat-messages').appendChild(div);
}

function outputMessageScore(message) {
  enableButtons();
  const div = document.createElement('div');
  div.classList.add('msg');
  
  var i;
  var scores = "";
  for (i=0;i<message.text.length;i++){
    var x = i+1;
    scores = scores + x + ". " + message.text[i].username + ": " + message.text[i].score + "</br>";
  }
  
  div.innerHTML = `<div class="message-data align-left fade-in-message">
  <center>
    <span class="message-data-time text-uppercase" > ${message.username}</span> &nbsp; &nbsp;
    <span class="message-data-name" >${message.time}</span>
  </center>
  </div>
  <div class="d-flex justify-content-start fade-in-message">
    <div class="Smessage score-message text-left text-uppercase font-weight-bold" style="font-size:12px">
      <center>${scores}</center>
    </div>
  </div>`;
  

  document.querySelector('.chat-messages').appendChild(div);
}

// Add room name to DOM
function outputRoomName(room) {
  roomName.innerText = room;
}

// Add users to DOM
function outputUsers(users) {
  const div = document.getElementById('users');
  // div.classList.add('row');
  div.innerHTML = `
    ${users.map(user => `<div class="col-3 mb-2 text-capitalize" style="font-size:12px;">
      <i class="fa fa-circle online"> </i>&nbsp;&nbsp; ${user.username}
    </div>`).join('')}
  `;

  // document.getElementById('users').appendChild(div);
}

function enableButtons(){
  rb = document.getElementById('btn-rock');
  pb = document.getElementById('btn-paper');
  sb = document.getElementById('btn-scissor');
  rb.disabled = false;
  pb.disabled = false;
  sb.disabled = false;
  rb.style.background = "#2d9135";
  pb.style.background = "#2d9135";
  sb.style.background = "#2d9135";
}

function disableButtons(){
  rb = document.getElementById('btn-rock');
  pb = document.getElementById('btn-paper');
  sb = document.getElementById('btn-scissor');
  rb.disabled = true;
  pb.disabled = true;
  sb.disabled = true;
  rb.style.background = "grey";
  pb.style.background = "grey";
  sb.style.background = "grey";
}
