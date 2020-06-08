  const games_online = [];

  function startGame( gameroom ){
    const choices = [];
    const round = 0;
    const gaming = { gameroom , choices, round };
    games_online.push(gaming);
    return gaming;
  }

  function addChoice(gameroom , thischoice){
    const gaming = games_online.find(gaming => gaming.gameroom === gameroom);
    const choiceList = gaming.choices;
    choiceList.push(thischoice);
  }
  
  function nextRound(gameroom){
    const gaming = games_online.find(gaming => gaming.gameroom === gameroom);
    gaming.round = gaming.round + 1;
    // choiceList.push(thischoice);
    return gaming.round;
  }

  function getChoiceList(gameroom){
    const gaming = games_online.find(gaming => gaming.gameroom === gameroom);
    const choiceList = gaming.choices;

    return choiceList;
  }

  function clearChoices(gameroom){
    const gaming = games_online.find(gaming => gaming.gameroom === gameroom);
    gaming.choices = [];
  }

  module.exports = {
    startGame,
    addChoice,
    getChoiceList,
    clearChoices,
    nextRound
  };
