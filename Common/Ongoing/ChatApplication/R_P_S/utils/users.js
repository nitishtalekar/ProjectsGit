const users = [];

// Join user to chat
function userJoin(id, username, room, game) {
  const user = { id, username, room, game };

  const exUser = users.find((user) => user.room === room && user.username === username);

  if(exUser){
    return 0;
  }

  users.push(user);

  return user;
}

// Get current user
function getCurrentUser(id) {
  return users.find(user => user.id === id);
}

// User leaves chat
function userLeave(id) {
  const index = users.findIndex(user => user.id === id);

  if (index !== -1) {
    return users.splice(index, 1)[0];
  }
}

function userJoinGame(id , game) {
  const thisuser = users.find(user => user.id === id);
  thisuser.game = game;

  // users.push(user);

  return thisuser;
}

// Get room users
function getRoomUsers(room) {
  return users.filter(user => user.room === room);
}

module.exports = {
  userJoin,
  getCurrentUser,
  userLeave,
  getRoomUsers,
  userJoinGame
};
