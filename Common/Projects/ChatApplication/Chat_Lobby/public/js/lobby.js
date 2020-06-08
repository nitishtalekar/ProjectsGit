const chatForm = document.getElementById('chat-form');
const chatMessages = document.querySelector('.chat-messages');
const roomName = document.getElementById('room-name');
const userList = document.getElementById('users');
const uname = document.getElementById('uname');
const start = document.getElementById('start');

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
  outputRoomName(room);
  outputUsers(users);
});

socket.on('chat', ({ id, room }) => {
  console.log(id, room);
  const str1 = 'chatbox.html?username=';
  const str2 = '&room=';
  const str3 = '&roomname=';
  const redirect_str = str1 + username + str2 + id + str3 + room;
  window.location.href = redirect_str;
});

socket.on('redirect', function(destination) {
    window.location.href = destination;
});

// Message from server
socket.on('message', message => {
  console.log(message);

  // Scroll down
  // chatMessages.scrollTop = chatMessages.scrollHeight;
});

// Message submit
chatForm.addEventListener('submit', e => {
  e.preventDefault();

  // Get message text
  socket.emit('start', { username, room, roomname });

});

// Output message to DOM


// Add room name to DOM
function outputRoomName(room) {
  roomName.innerText = room;
}

// Add users to DOM
function outputUsers(users) {
  const div = document.getElementById('users');
  console.log(users);
  // div.classList.add('row');
  div.innerHTML = `
    ${users.map(user => `<div class="col-3 mb-2 text-capitalize">
      <i class="fa fa-circle online"> </i>&nbsp;&nbsp; ${user.username}
    </div>`).join('')}
  `;

  // document.getElementById('users').appendChild(div);
}
