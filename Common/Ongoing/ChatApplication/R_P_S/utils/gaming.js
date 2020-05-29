  const games_online = [];

  function startGame( gameroom ){
    const choices = [];
    const gaming = { gameroom , choices };
    games_online.push(gaming);
    return gaming;
  }

  function addChoice(gameroom , thischoice){
    const gaming = games_online.find(gaming => gaming.gameroom === gameroom);
    const choiceList = gaming.choices;
    choiceList.push(thischoice);
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
    clearChoices
  };
