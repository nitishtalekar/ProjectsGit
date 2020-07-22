const chatForm = document.getElementById('chat-form');
const chatMessages = document.querySelector('.chat-messages');
const roomName = document.getElementById('room-name');
const userList = document.getElementById('users');
const uname = document.getElementById('uname');

// Get username and room from URL
const { username, room, roomname } = Qs.parse(location.search, {
  ignoreQueryPrefix: true
});

uname.innerHTML= `${username}`;

const socket = io();

// Join chatroom
socket.emit('joinRoom', { username, room });

// Get room and users
socket.on('roomUsers', ({ room, users }) => {
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

// Message submit
chatForm.addEventListener('submit', e => {
  e.preventDefault();

  // Get message text
  const msg = e.target.elements.msg.value;
  
  if (msg !== ""){
    // Emit message to server
    socket.emit('chatMessage', msg);
  
    // Clear input
    e.target.elements.msg.value = '';
    e.target.elements.msg.focus();
  }

  
});

// Output message to DOM
function outputMessage(message) {
  
  const div = document.createElement('div');
  div.classList.add('msg');

  if( message.username === username ){
    textbreak = message.text.replace(/\n/g, '<br>\n');
    div.innerHTML = `<div class="message-data align-right fade-in-message">
        <span class="message-data-name" >${message.time}</span> &nbsp; &nbsp;
        <span class="message-data-time" >Me</span> <i class="fa fa-circle me"></i>
      </div>
      <div class="d-flex justify-content-end fade-in-message">
        <div class="message other-message text-right font-weight-bold">
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
    textbreak = message.text.replace(/\n/g, '<br>\n');
    div.innerHTML = `<div class="message-data align-left fade-in-message">
      <span class="message-data-time text-capitalize" ><i class="fa fa-circle-thin me" aria-hidden="true"></i> ${message.username}</span> &nbsp; &nbsp;  
      <span class="message-data-name" >${message.time}</span>                     
    </div>
    <div class="d-flex justify-content-start fade-in-message">
      <div class="message my-message text-left">
        ${textbreak}
      </div>
    </div>`;
  }

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
    ${users.map(user => `<div class="col-3 mb-2 text-capitalize">
      <i class="fa fa-circle online"> </i>&nbsp;&nbsp; ${user.username}
    </div>`).join('')}
  `;
  
  // document.getElementById('users').appendChild(div);
}
