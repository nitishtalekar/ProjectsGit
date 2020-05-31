const game_users = [];

// Join user to chat
function userJoinGame(id, username, game, score) {
  const user = { id, username, game, score };

  const exUser = game_users.find((user) => user.game === game && user.username === username);

  if(exUser){
    return 0;
  }

  game_users.push(user);

  return user;
}

// Get current user
function getCurrentUserGame(id) {
  return game_users.find(user => user.id === id);
}

// User leaves chat
function userLeaveGame(id) {
  const index = game_users.findIndex(user => user.id === id);

  if (index !== -1) {
    return game_users.splice(index, 1)[0];
  }
}

// Get room game_users
function getRoomUsersGame(game) {
  return game_users.filter(user => user.game === game);
}

module.exports = {
  userJoinGame,
  getCurrentUserGame,
  userLeaveGame,
  getRoomUsersGame
};
