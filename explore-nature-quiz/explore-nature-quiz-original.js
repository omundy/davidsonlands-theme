// the main quiz program
// written in 2019 by Owen Mundy and Critical Web Design (Jason, Drew, Sam)

"use strict";

// GLOBAL VARS FOR ALL QUIZZES

let dataFile = null;
let quizData = null;
let current = {}
var myNames = [];
var myWingspans = [];
var myHostplants = [];
var myHabitats = [];
var myflightperiods = [];
var myFunfacts = [];
var funFactChosen = [];
var myImages = [];
var namesChosen = [];
var wingspanChosen = [];
var hostplantChosen = [];
var habitatChosen = [];
var flightperiodChosen = [];
var imagesChosen = [];
var mySizes = [];
var myFood = [];
var sizesChosen = [];
var foodChosen = [];
var answers = [];
let correctAnswers = [];
let currentCorrectAnswer = "";
let allInfo = [];
let userScore = [];
let currentQuestion = 1;
let userChoice = 0;
let scores = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

function resetQuizData(){

    current = {
        "difficulty": "", // 1,2
        "category": "", // "birds","insects","butterflies"
        "questionIndex": 0,
        "questionText": "",
        "answerIndex": null,
        "answerText": "",
    }
    correctAnswers = [];
    currentCorrectAnswer = "";
    myNames = [];
    myWingspans = [];
    myHostplants = [];
    myHabitats = [];
    myflightperiods = [];
    myFunfacts = [];
    funFactChosen = [];
    myImages = [];
    namesChosen = [];
    wingspanChosen = [];
    hostplantChosen = [];
    habitatChosen = [];
    flightperiodChosen = [];
    imagesChosen = [];
    mySizes = [];
    myFood = [];
    sizesChosen = [];
    foodChosen = [];
    answers = [];
    allInfo = [];
    userScore = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    scores = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    currentQuestion = 1;
    userChoice = 0;
}



const totalQuestions = 10;
const x = document.getElementsByTagName("BODY")[0];
const question = document.getElementById("question");
const score = document.getElementById("score");
const image = document.getElementById("image");
let b1 = document.getElementById('button1');
let b2 = document.getElementById('button2');
let b3 = document.getElementById('button3');
let b4 = document.getElementById('button4');
const quiz = document.getElementById("quiz");
const back = document.getElementById('back');
const next = document.getElementById('next');
const progress = document.getElementById("progress");
const funFactPrompt = document.getElementById("funFactPrompt");
const easy = document.getElementById("buttonEasy");
const hard = document.getElementById("buttonHard");
const birdsButton = document.getElementById("buttonBirds");
const insectsButton = document.getElementById("buttonInsects");
const butterfliesButton = document.getElementById("buttonButterflies");
const gotoQuizButton = document.getElementById("gotoQuiz");
const warningMessage = document.getElementById("warningMessage");




function ran0toN(n) {
    return Math.floor((Math.random() * n));
}
function generateNUniqueRan(n, avoid, totalNumber) {
    var repeat = [];
    for (var i = 0; i < n; i++) {
        var ran = ran0toN(totalNumber);
        while (repeat.indexOf(ran) != -1 || ran == avoid) {
            ran = ran0toN(totalNumber);
        }
        repeat.push(ran);
    }
    return repeat;
}



/*  EVENT LISTENERS
 ******************************************************************************/

gotoQuizButton.addEventListener('click', function() {
    gotoQuiz();
});
easy.addEventListener('click', function() {
    chooseEasy();
});
hard.addEventListener('click', function() {
    chooseHard();
});
birdsButton.addEventListener('click', function() {
    chooseBirds();
});
insectsButton.addEventListener('click', function() {
    chooseInsects();
});
butterfliesButton.addEventListener('click', function() {
    chooseButterflies();
});

function chooseEasy() {
    $('#buttonEasy, #buttonHard').removeClass("btn-primary").addClass("btn-secondary");
    $('#buttonEasy').removeClass("btn-secondary").addClass("btn-primary");
    // easy.classList.add('green-glow2');
    current.difficulty = "easy";
}

function chooseHard() {
    $('#buttonEasy, #buttonHard').removeClass("btn-primary").addClass("btn-secondary");
    $('#buttonHard').removeClass("btn-secondary").addClass("btn-primary");
    // hard.classList.add('green-glow2');
    current.difficulty = "hard";
}

function chooseBirds() {
    dataFile = "birds_data.json";
    loadJSON(dataFile);
    current.category = "birds";
    $('#buttonBirds, #buttonInsects, #buttonButterflies').removeClass("btn-primary").addClass("btn-secondary");
    $('#buttonBirds').removeClass("btn-secondary").addClass("btn-primary");
}

function chooseInsects() {
    dataFile = "insects_data.json";
    loadJSON(dataFile);
    current.category = "insects";
    $('#buttonBirds, #buttonInsects, #buttonButterflies').removeClass("btn-primary").addClass("btn-secondary");
    $('#buttonInsects').removeClass("btn-secondary").addClass("btn-primary");
}

function chooseButterflies() {
    dataFile = "butterflies_data.json";
    loadJSON(dataFile);
    current.category = "butterflies";
    $('#buttonBirds, #buttonInsects, #buttonButterflies').removeClass("btn-primary").addClass("btn-secondary");
    $('#buttonButterflies').removeClass("btn-secondary").addClass("btn-primary");
}



function showIntro(){
    // intro
    $('#quizIntro').show();
    // quiz
    msg(null);
    funFact(null);
    $('#quiz').hide();
    $('#confetti').hide();    
}
function showQuiz(){
    // intro
    $('#quizIntro').hide();
    // quiz
    msg(null);
    funFact(null);
    $('#quiz').show();
}
showIntro();
    

function msg(type,text){
    // set all others hidden
    $('.alert-success').html('');
    $('.alert-success').hide();
    $('.alert-warning').html('');
    $('.alert-warning').hide();
    $('.alert-danger').html('');
    $('.alert-danger').hide();
    if (type != '' && text != ''){
        // set this one
        $('.alert-'+type).html(text);
        $('.alert-'+type).show();
    }
}



/*  QUIZ FUNCTIONS
 ******************************************************************************/

function gotoQuiz() {
    if (current.difficulty == "" ) {
        msg('warning','Please Choose a Difficulty');
    } else if (current.category == "" ) {
        msg('warning','Please choose a Category');
    }
    else {
        if (quizData !== null) 
            startQuiz();
        else
            loadJSON(dataFile);
        showQuiz();
    }
}

function loadJSON(file) {
    $.getJSON("/wp/wp-content/themes/davidsonlands-theme/explore-nature-quiz/data/" + file, function(data) {
            quizData = data.data;
            console.log(quizData);
        })
        .error(function(error) {
            console.error(error);
        });
}





function startQuiz() {
    let ranNum = 0;


    // butterflies is unique
    if (current.category === "butterflies") {

        

        for (var index in quizData) {
            myNames.push(quizData[index].name);
            myWingspans.push(quizData[index].wingspan);
            myHostplants.push(quizData[index].hostplant);
            myHabitats.push(quizData[index].habitat);
            myflightperiods.push(quizData[index].flightperiod);
            myFunfacts.push(quizData[index].funfacts);
            myImages.push(quizData[index].image);
        }
        //console.log("myFunfacts",myFunfacts)

        allInfo = [
            myNames,
            myWingspans,
            myHostplants,
            myHabitats,
            myflightperiods,
            myFunfacts
        ];

        correctAnswers = generateNUniqueRan(totalQuestions, -1, myNames.length);

        for (var i = 0; i < totalQuestions; i++) {
            imagesChosen.push(myImages[correctAnswers[i]]);
            answers.push(ran0toN(4) + 1);
            namesChosen.push(myNames[correctAnswers[i]]);
            funFactChosen.push(myFunfacts[correctAnswers[i]]);
            wingspanChosen.push(myWingspans[correctAnswers[i]]);
            hostplantChosen.push(myHostplants[correctAnswers[i]]);
            flightperiodChosen.push(myflightperiods[correctAnswers[i]]);
            habitatChosen.push(myHabitats[correctAnswers[i]]);
        }
        var questionArray = [
            "What is the name of this butterfly?",
            // "What is the wing span of this butterfly",
            "Which is the following is a host plant of this butterfly",
            "Where does this butterfly inhabit?",
            "During when is this buttefly's flight period",
            "Which of the following is true about this butterfly?"
        ];
    } else {

        

        for (var index in quizData) {
            myNames.push(quizData[index].name);
            myFood.push(quizData[index].food);
            mySizes.push(quizData[index].size);
            myHabitats.push(quizData[index].habitat);
            myImages.push(quizData[index].image);
            myFunfacts.push(quizData[index].funfacts);
        }

        allInfo = [
            myNames,
            mySizes,
            myFood,
            myHabitats,
            myFunfacts
        ];

        correctAnswers = generateNUniqueRan(totalQuestions, -1, myNames.length);

        for (let i = 0; i < totalQuestions; i++) {
            imagesChosen.push(myImages[correctAnswers[i]]);
            answers.push(ran0toN(4) + 1);
            namesChosen.push(myNames[correctAnswers[i]]);
            funFactChosen.push(myFunfacts[correctAnswers[i]]);
            sizesChosen.push(mySizes[correctAnswers[i]]);
            foodChosen.push(myFood[correctAnswers[i]]);
            habitatChosen.push(myHabitats[correctAnswers[i]]);
        }
        var questionArray = [
            "What is the name of this animal?",
            "What is the correct size of this animal",
            "Which of the following describes this animal's eating habit?",
            "Where does this animal inhabit?",
            "Which of the following is true about this animal?"
        ];
    }

    console.log("current",current);    
}


var b1click = function() {
        chooseAnswer("button1", b1, currentQuestion, 1);
    };
    var b2click = function() {
        chooseAnswer("button2", b2, currentQuestion, 2);
    };
    var b3click = function() {
        chooseAnswer("button3", b3, currentQuestion, 3);
    };
    var b4click = function() {
        chooseAnswer("button4", b4, currentQuestion, 4);
    };

function startQuestion(currentIndex) {

    // scroll to top
    $('html,body').animate({
        scrollTop: $('#image').position().top
    }, 'slow');

    // reset
    $('#button1,#button2,#button3,#button4').removeClass("btn-primary btn-danger").addClass("btn-secondary");
    $('#confetti').hide();
    

    if (currentIndex >= 1 && currentIndex <= totalQuestions + 1) {





        if (currentIndex >= 2 && currentIndex <= totalQuestions + 1) {

            $(document).on('click','#back',function(){
                startQuestion(currentIndex--);
            });



        }


        showQuiz();


        currentQuestion = currentIndex;

        // quiz finished
        if (currentIndex === totalQuestions + 1) {

            showIntro();


            image.style.display = "none";
            b1.style.display = "none";
            b2.style.display = "none";
            b3.style.display = "none";
            b4.style.display = "none";
            score.style.display = "block";
            // correctMessage.style.display = "none";
            question.style.display = "none";
            // wrongMessage.style.display = "none";
            next.innerHTML = "Restart";
            next.addEventListener('click', restart);
            let userScoreStr = 0;
            for (let i = 0; i < scores.length; i++) {
                userScoreStr += scores[i];
            }
            score.innerHTML = "You got " + userScoreStr + " questions right!";

        //    
        } else {
            scores[currentIndex - 1] = 0;
            image.style.display = "block";

            b1.style.display = "block";
            b2.style.display = "block";
            b3.style.display = "block";
            b4.style.display = "block";
            score.style.display = "none";
            question.style.display = "block";
            b1.style.cursor = "pointer";
            b2.style.cursor = "pointer";
            b3.style.cursor = "pointer";
            b4.style.cursor = "pointer";
            next.style.cursor = "default";
            // correctMessage.style.display = "none";
            // wrongMessage.style.display = "none";
            b1.classList.remove('green-glow');
            b2.classList.remove('green-glow');
            b3.classList.remove('green-glow');
            b4.classList.remove('green-glow');
            b1.classList.remove('red-glow');
            b2.classList.remove('red-glow');
            b3.classList.remove('red-glow');
            b4.classList.remove('red-glow');
            image.src = imagesChosen[currentIndex - 1];

            if (current.difficulty == "easy") {

                currentCorrectAnswer = "";


                question.innerHTML = questionArray[0];
                var threeRan = generateNUniqueRan(3, correctAnswers[currentIndex - 1]);

console.log("threeRan",threeRan);

                if (answers[currentIndex - 1] == 1) {
                    b1.innerHTML = myNames[correctAnswers[currentIndex - 1]];
                    b2.innerHTML = myNames[threeRan[0]];
                    b3.innerHTML = myNames[threeRan[1]];
                    b4.innerHTML = myNames[threeRan[2]];
                }
                if (answers[currentIndex - 1] == 2) {
                    b2.innerHTML = myNames[correctAnswers[currentIndex - 1]];
                    b1.innerHTML = myNames[threeRan[0]];
                    b3.innerHTML = myNames[threeRan[1]];
                    b4.innerHTML = myNames[threeRan[2]];
                }
                if (answers[currentIndex - 1] == 3) {
                    b3.innerHTML = myNames[correctAnswers[currentIndex - 1]];
                    b1.innerHTML = myNames[threeRan[0]];
                    b2.innerHTML = myNames[threeRan[1]];
                    b4.innerHTML = myNames[threeRan[2]];
                }
                if (answers[currentIndex - 1] == 4) {
                    b4.innerHTML = myNames[correctAnswers[currentIndex - 1]];
                    b1.innerHTML = myNames[threeRan[0]];
                    b2.innerHTML = myNames[threeRan[1]];
                    b3.innerHTML = myNames[threeRan[2]];
                }
            }
            if (current.difficulty == "hard") {
                ranNum = Math.floor(Math.random() * 4) + 1;
                question.innerHTML = questionArray[ranNum];
                var threeRan = generateNUniqueRan(3, correctAnswers[currentIndex - 1]);
                if (answers[currentIndex - 1] == 1) {
                    if (ranNum !== 4) {
                        b1.innerHTML = allInfo[ranNum][correctAnswers[currentIndex - 1]];
                        b2.innerHTML = allInfo[ranNum][threeRan[0]];
                        b3.innerHTML = allInfo[ranNum][threeRan[1]];
                        b4.innerHTML = allInfo[ranNum][threeRan[2]];
                    } else {
                        var ranIndex = ran0toN(myFunfacts[correctAnswers[currentIndex - 1]].length);
                        b1.innerHTML = myFunfacts[correctAnswers[currentIndex - 1]][ranIndex];
                        b2.innerHTML = myFunfacts[threeRan[0]][ranIndex];
                        b3.innerHTML = myFunfacts[threeRan[1]][ranIndex];
                        b4.innerHTML = myFunfacts[threeRan[2]][ranIndex];
                    }
                }
                if (answers[currentIndex - 1] == 2) {
                    if (ranNum !== 4) {
                        b2.innerHTML = allInfo[ranNum][correctAnswers[currentIndex - 1]];
                        b1.innerHTML = allInfo[ranNum][threeRan[0]];
                        b3.innerHTML = allInfo[ranNum][threeRan[1]];
                        b4.innerHTML = allInfo[ranNum][threeRan[2]];
                    } else {
                        var ranIndex = ran0toN(myFunfacts[correctAnswers[currentIndex - 1]].length);
                        b2.innerHTML = myFunfacts[correctAnswers[currentIndex - 1]][ranIndex];
                        b1.innerHTML = myFunfacts[threeRan[0]][ranIndex];
                        b3.innerHTML = myFunfacts[threeRan[1]][ranIndex];
                        b4.innerHTML = myFunfacts[threeRan[2]][ranIndex];
                    }
                }
                if (answers[currentIndex - 1] == 3) {
                    if (ranNum !== 4) {
                        b3.innerHTML = allInfo[ranNum][correctAnswers[currentIndex - 1]];
                        b2.innerHTML = allInfo[ranNum][threeRan[0]];
                        b1.innerHTML = allInfo[ranNum][threeRan[1]];
                        b4.innerHTML = allInfo[ranNum][threeRan[2]];
                    } else {
                        var ranIndex = ran0toN(myFunfacts[correctAnswers[currentIndex - 1]].length);
                        b3.innerHTML = myFunfacts[correctAnswers[currentIndex - 1]][ranIndex];
                        b2.innerHTML = myFunfacts[threeRan[0]][ranIndex];
                        b1.innerHTML = myFunfacts[threeRan[1]][ranIndex];
                        b4.innerHTML = myFunfacts[threeRan[2]][ranIndex];
                    }
                }
                if (answers[currentIndex - 1] == 4) {
                    if (ranNum !== 4) {
                        b4.innerHTML = allInfo[ranNum][correctAnswers[currentIndex - 1]];
                        b2.innerHTML = allInfo[ranNum][threeRan[0]];
                        b3.innerHTML = allInfo[ranNum][threeRan[1]];
                        b1.innerHTML = allInfo[ranNum][threeRan[2]];
                    } else {
                        var ranIndex = ran0toN(myFunfacts[correctAnswers[currentIndex - 1]].length);
                        b4.innerHTML = myFunfacts[correctAnswers[currentIndex - 1]][ranIndex];
                        b2.innerHTML = myFunfacts[threeRan[0]][ranIndex];
                        b3.innerHTML = myFunfacts[threeRan[1]][ranIndex];
                        b1.innerHTML = myFunfacts[threeRan[2]][ranIndex];
                    }
                }
            }


            //*****************************************************************

            progress.innerHTML = "Question " + currentIndex + " of " + totalQuestions;
            b1.addEventListener('click', b1click);
            b2.addEventListener('click', b2click);
            b3.addEventListener('click', b3click);
            b4.addEventListener('click', b4click);
            b1.addEventListener('click', function() {
                mouseDown(b1);
            });
            b2.addEventListener('click', function() {
                mouseDown(b2);
            });
            b3.addEventListener('click', function() {
                mouseDown(b3);
            });
            b4.addEventListener('click', function() {
                mouseDown(b4);
            });
        }
    }
}






function correctAnswer(id, currentIndex, userChoice) {
    $('#confetti').show();
    scores[currentQuestion - 1] = 1;
    next.style.cursor = "pointer";
    // change style
    $('#'+id).removeClass("btn-secondary").addClass("btn-primary");

    msg('success', "Great Job!");

    // correctMessage.style.display = "block";
    // wrongMessage.style.display = "none";
    b1.classList.remove('red-glow');
    b2.classList.remove('red-glow');
    b3.classList.remove('red-glow');
    b4.classList.remove('red-glow');
    b1.style.cursor = "default";
    b2.style.cursor = "default";
    b3.style.cursor = "default";
    b4.style.cursor = "default";
    b1.removeEventListener('click', b1click);
    b2.removeEventListener('click', b2click);
    b3.removeEventListener('click', b3click);
    b4.removeEventListener('click', b4click);


    $(document).on('click','#next',function(){
        console.log(currentQuestion++);
        startQuestion(currentQuestion++);
    });


}

function wrongAnswer(id, index, userChoice) {


    scores[index - 1] = 0;
    //button.classList.add('red-glow');
    $('#'+id).removeClass("btn-secondary").addClass("btn-danger");


    // wrongMessage.innerHTML = ;
    // wrongMessage.style.display = "block";

    msg('danger',"The correct answer is " + answers[index - 1]);
    console.log(answers,myNames, correctAnswers, currentCorrectAnswer)

    // correctMessage.style.display = "none";
    next.style.cursor = "pointer";
    b1.style.cursor = "default";
    b2.style.cursor = "default";
    b3.style.cursor = "default";
    b4.style.cursor = "default";
    b1.removeEventListener('click', b1click);
    b2.removeEventListener('click', b2click);
    b3.removeEventListener('click', b3click);
    b4.removeEventListener('click', b4click);
    if (answers[index - 1] === 1) {
        $('#button1').removeClass("btn-secondary").addClass("btn-primary");
    }
    if (answers[index - 1] === 2) {
        $('#button2').removeClass("btn-secondary").addClass("btn-primary"); 
    }
    if (answers[index - 1] === 3) {
        $('#button3').removeClass("btn-secondary").addClass("btn-primary");
    }
    if (answers[index - 1] === 4) {
        $('#button4').removeClass("btn-secondary").addClass("btn-primary");
    }


    $(document).on('click','#next',function(){
        startQuestion(currentQuestion++);
    });


}

function funFact(currentIndex,currentQuestion){
    if (currentIndex == null){
        $('.alert-info').html('');
        $('.alert-info').hide();  
    } else {
        var ranIndex = ran0toN(funFactChosen[currentIndex - 1].length);
        $('.alert-info').html("<b>Fun fact:</b> "+ funFactChosen[currentIndex - 1][ranIndex]);
    }
}

function chooseAnswer(id, button, currentIndex, userChoice) {
    console.log("chooseAnswer()", id, button, currentIndex, userChoice);

    funFact(currentIndex, userChoice);

    if (userChoice !== answers[currentIndex - 1]) {
        wrongAnswer(id, currentIndex, userChoice);
    } else {
        correctAnswer(id, currentIndex, userChoice);
    }
}

function mouseDown(target) {
    // b1.style.background = "white";
    // b1.style.color = "#6D9F71";
    // b2.style.background = "white";
    // b2.style.color = "#6D9F71";
    // b3.style.background = "white";
    // b3.style.color = "#6D9F71";
    // b4.style.background = "white";
    // b4.style.color = "#6D9F71";
}

function restart() {
    // reset all data
    resetQuizData();
    // show intro
    showIntro();
    // show first question
    startQuestion(1);
}
startQuestion(1);
