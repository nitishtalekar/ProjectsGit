const moment = require('moment');

function formatMessage(username, text) {
  return {
    username,
    text,
    time: moment().format('h:mm a')
  };
}

function formatMessageArr(username, textarr) {
  var i = 0;
  var text = "";
  for (i=0;i<textarr.length;i++){
    text = text+textarr[i]+"--";
  }
  return {
    username,
    text,
    time: moment().format('h:mm a')
  };
}

// function formatMessage(username, text) {
//   return {
//     username,
//     text,
//     time: moment().format('h:mm a')
//   };
// }

module.exports = {formatMessage,formatMessageArr};
