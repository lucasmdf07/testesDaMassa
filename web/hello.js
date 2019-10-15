function  numberGuessingGame(answer) {

    var message = "I'm thinking of a number between 1 -100.\n" + "Try to guess it!\n" + "Please enter an integer between 1 and 100.";
    var i = 0;
    do{
        var guess = parseInt(window.prompt(message));
        if(guess < answer){
            message = guess + " is too low. Please enter another integer";
        }
        else if (guess > answer){
            message = guess + " is too high. Please enter another integer.";
        }
        i++
    } while ( guess != answer && !isNaN(guess));

    if(isNaN(guess))
        {
            window.alert("Aw you quit :o")
        }
    else{
        message = guess + " is correct!!"
        window.alert(message + "\n"+"It took you " +i+" guesses");
    }
    return "Play again?";
}
function play(){
    answer = Math.round(100*Math.random());
    var question = numberGuessingGame(answer);
    document.getElementById("output").innerHTML = question;
}
