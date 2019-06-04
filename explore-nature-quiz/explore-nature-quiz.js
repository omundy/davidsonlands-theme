// the main quiz program
// written in 2019 by Owen Mundy and Critical Web Design (Jason, Drew, Sam)

"use strict";


/*  GLOBAL
 ******************************************************************************/

let baseUrl = "/wp/wp-content/themes/davidsonlands-theme/explore-nature-quiz/",
    current = {},
    quizData = {};


function resetQuizData() {
    currentQuestionIndex = 0;
    current = {
        "totalCorrect":0,
        "selected":false,
        "difficulty": "", // "easy","hard"
        "category": "", // "birds","insects","butterflies"
        "questionIndex": 0,
        "questionText": "",
        "answerIndex": null,
        "answerText": "",
        "dataFile": "",
        "questions": []
    };
    quizData = {};
}
var animalsQuestionObj = {
    'easy': {
        "name":"What is the name of this animal?",
    },
    "hard": {
        "name":"What is the name of this animal?",
        "food":"Which of the following describes the eating habit of this animal?",
        "true":"Which of the following is true about this animal?"
    }
};
var butterfliesQuestionObj = {
    "easy": {
        "name":"What is the name of this butterfly?",
    },
    "hard": {
        "name":"What is the name of this butterfly?",
        "hostplant":"Which of the following is a host plant of this butterfly",
        // "flightperiod":"What is the flight period of this butterfly?",
        "true":"Which of the following is true about this butterfly?"
    }
};
var questionObj = {
    "name": "",
    "data":{},
    "question": "",
    "questionKey": "",
    "possibleAnswers": {},
    "answer": 0,
    "funFact": "",
    "image":"",
    "correct":0,
}
var possibleAnswers = {
    "answer":"",
    "a2":"",
    "a3":"",
    "a4":"",
}
let currentQuestionIndex = 0;




/*  SCREENS
 ******************************************************************************/

// show intro screen
function showIntro() {
    // intro
    $('#quizIntro').show();
    // reset selections
    $('#easy, #hard').removeClass("btn-primary").addClass("btn-secondary");
    $('#birds, #insects, #butterflies').removeClass("btn-primary").addClass("btn-secondary");
    // quiz
    updateMsg(null);
    updateFunFact(null);
    // messages
    $('#quiz').hide();
    $('#confetti').hide();
    // finish
    $('#quizFinish').hide();
}
// show quiz screen
function showQuiz() {
    // intro
    $('#quizIntro').hide();
    // messages
    updateMsg(null);
    updateFunFact(null);
    // quiz
    $('#quiz').show();
    // finish
    $('#quizFinish').hide();
}
// show finish screen
function showFinish() {
    // intro
    $('#quizIntro').hide();
    $('.outcome-score').html("Your result: <span>" + current.totalCorrect + "/10</span>");
    if (current.totalCorrect >= 10){
        $('.outcome').html("You got a perfect score!!!");
    } else if (current.totalCorrect >= 7){
        $('.outcome').html("Super job!!");
    } else if (current.totalCorrect >= 4){
        $('.outcome').html("Not so shabby. Maybe spend some more time in nature and give it another shot?");
    } else if (current.totalCorrect >= 0){
        $('.outcome').html("Good try. You'll do better next time!");
    }
    // messages
    updateMsg(null);
    updateFunFact(null);
    // quiz
    $('#quiz').hide();
    // finish
    $('#quizFinish').show();
}






/*  QUIZ FUNCTIONS
 ******************************************************************************/

// go to quiz
function gotoQuiz() {
    if (current.difficulty == "") {
        updateMsg('warning', 'Please Choose a Difficulty');
    } else if (current.category == "") {
        updateMsg('warning', 'Please choose a Category');
    } else {
        if (quizData !== null)
            selectQuestions(10);
        else
            loadJSON(current.dataFile);
        showQuiz();
    }
}
// load data
function loadJSON(file) {
    $.getJSON(baseUrl + "data/" + file, function(data) {
            // save data
            quizData = data.data;
            // console.log(quizData);
        })
        .error(function(error) {
            console.error(error);
        });
}
// select n questions
function selectQuestions(count) {
    if (quizData == null) return;

    // select 10 random animals in the category
    let randomAnimals = getRandomUniqueFromObj(quizData, count);
    // console.log("randomAnimals",randomAnimals);
    // loop through and build questions
    for (let i = 0; i < randomAnimals.length; i++) {
        //console.log(randomAnimals[i]);
        // save reference
        let q = current.questions[i];
        // assign base question obj
        q = Object.assign({}, questionObj);
        // set data for this animal
        q.data = Object.assign({}, randomAnimals[i]);
        // set data for this animal
        q.name = randomAnimals[i].name;
        // assign new (empty) possible answers
        q.possibleAnswers = Object.assign({}, possibleAnswers);


        // *** QUESTIONS ***

        // pick random question
        if (current.category == "butterflies"){
            // if butterflies
            q.questionKey = getRandomKeyFromObj(butterfliesQuestionObj[current.difficulty]);
            q.question = butterfliesQuestionObj[current.difficulty][q.questionKey];

        } else {
            // all other animals
            q.questionKey = getRandomKeyFromObj(animalsQuestionObj[current.difficulty]);
            q.question = animalsQuestionObj[current.difficulty][q.questionKey];

        }

        if (current.difficulty == "hard" && q.questionKey != "name"){
            // update "this butterfly" in question
            q.question = q.question.replace("this butterfly","the "+ q.name);
            // update "this animal" in question
            q.question = q.question.replace("this animal","the "+ q.name);
        }



        console.log("\n###############################################"); 
        console.log("INDEX =",i); 
        console.log("NAME =",q.data.name);

        // *** ANSWERS ***
        // 
        // pick 3 other animals to build other (random) answers
        let otherAnimals = returnRandomUniqueNumbersArray(randomAnimals.length,4,i)
        // console.log("returnRandomUniqueNumbersArray",otherAnimals)
        
        // names of other animals (ALL ANIMALS)
        if (q.questionKey === "name"){
            // set answer, then others
            q.possibleAnswers.answer = q.data.name;
            q.possibleAnswers.a2 = randomAnimals[otherAnimals[1]].name;
            q.possibleAnswers.a3 = randomAnimals[otherAnimals[2]].name;
            q.possibleAnswers.a4 = randomAnimals[otherAnimals[3]].name;
        } 
        // foods from other animals (ALL EXCEPT BUTTERFLIES)
        else if (q.questionKey === "food"){
            // set answer, then others
            q.possibleAnswers.answer = randomAnimals[otherAnimals[0]].food;
            q.possibleAnswers.a2 = randomAnimals[otherAnimals[1]].food;
            q.possibleAnswers.a3 = randomAnimals[otherAnimals[2]].food;
            q.possibleAnswers.a4 = randomAnimals[otherAnimals[3]].food;
        } 
        // plants from other animals (BUTTERFLIES ONLY)
        else if (q.questionKey === "hostplant"){
            // set answer, then others
            q.possibleAnswers.answer = randomAnimals[otherAnimals[0]].hostplant;
            q.possibleAnswers.a2 = randomAnimals[otherAnimals[1]].hostplant;
            q.possibleAnswers.a3 = randomAnimals[otherAnimals[2]].hostplant;
            q.possibleAnswers.a4 = randomAnimals[otherAnimals[3]].hostplant;
        } 
        // flight from other animals (BUTTERFLIES ONLY)
        else if (q.questionKey === "flightperiod"){
            // set answer, then others
            q.possibleAnswers.answer = randomAnimals[otherAnimals[0]].flightperiod;
            q.possibleAnswers.a2 = randomAnimals[otherAnimals[1]].flightperiod;
            q.possibleAnswers.a3 = randomAnimals[otherAnimals[2]].flightperiod;
            q.possibleAnswers.a4 = randomAnimals[otherAnimals[3]].flightperiod;
        } 
        // funfacts of other animals (ALL ANIMALS)
        else if (q.questionKey === "true"){
            // set answer, then others
            q.possibleAnswers.answer = randomAnimals[otherAnimals[0]].funfacts[getRandomIndexFromArray(randomAnimals[otherAnimals[0]].funfacts)];
            q.possibleAnswers.a2 = randomAnimals[otherAnimals[1]].funfacts[getRandomIndexFromArray(randomAnimals[otherAnimals[1]].funfacts)];
            q.possibleAnswers.a3 = randomAnimals[otherAnimals[2]].funfacts[getRandomIndexFromArray(randomAnimals[otherAnimals[2]].funfacts)];
            q.possibleAnswers.a4 = randomAnimals[otherAnimals[3]].funfacts[getRandomIndexFromArray(randomAnimals[otherAnimals[3]].funfacts)];
        }
        // randomize answers
        q.possibleAnswers = shuffleObject(q.possibleAnswers);
      
        // set answer
        q.answer = getRandomIndexFromArray(q.possibleAnswers);
        // set funFact
        q.funFact = "";
        // set image
        q.image = q.data.image;

        // save back into current
        current.questions[i] = q;

        console.log("%cQUESTION = " + q.question + " ( questionKey=" + q.questionKey + ")</b>", 'font-weight: bold; color: #327357');
        console.log("q.possibleAnswers.answer",JSON.stringify(q.possibleAnswers.answer));    
        console.log("q.possibleAnswers.a2",JSON.stringify(q.possibleAnswers.a2));    
        console.log("q.possibleAnswers.a3",JSON.stringify(q.possibleAnswers.a3));    
        console.log("q.possibleAnswers.a4",JSON.stringify(q.possibleAnswers.a4));   

        // all data
        // console.log("current.questions",JSON.stringify(current.questions[i]));    
    }    
    showQuestion(0);
}

function showQuestion(index) {
    // update global index
    currentQuestionIndex = index;
    // display 
    $('#progress').html("Question " + (index+1) + " of " + current.questions.length);
    $('#choice1,#choice2,#choice3,#choice4').removeClass("btn-primary btn-danger").addClass("btn-secondary");
    $('#confetti').hide();
    // scroll to top
    $('html,body').animate({
        scrollTop: $('.quiz-image').position().top 
    }, 'slow');
    // messages
    updateMsg(null);
    updateFunFact(null);

    //console.log(JSON.stringify(current));
    // console.log(JSON.stringify(JSON.parse(current),null,2));
    console.log("showQuestion()", index, current.questions[index])

    // data for question
    $('#question').html(current.questions[index].question);
    let i = 1;
    for (var a in current.questions[index].possibleAnswers){
        // mark correct
        if (a == "answer"){
           $('#choice'+ i).attr("data-correct",1);
           $('#choice'+ i).html("<i>"+ current.questions[index].possibleAnswers[a] +"</i>");
        } else {
          $('#choice'+ i).attr("data-correct",0);
          $('#choice'+ i).html(current.questions[index].possibleAnswers[a]);
        }
        i++;
    }
    // image
    $('.quiz-image').attr('src','http://drewmkromer.com/SID-Project/images/'+ current.questions[index].image);
}

$(document).on('click','.quiz-choice',function(){
    if (current.questions[currentQuestionIndex].selected) return;
    // set selected
    current.questions[currentQuestionIndex].selected = true;
    // if correct
    if ($(this).attr("data-correct") == 1){
        chooseCorrect(currentQuestionIndex,this);
    }
    else {
        chooseWrong(currentQuestionIndex,this);
    }

    // show correct
    $('*[data-correct="1"]').removeClass("btn-secondary").addClass("btn-primary");
    // show funfact
    updateFunFact(currentQuestionIndex);
    // update
    // updateDisplay();
});

function chooseCorrect(index,btn) {
    // console.log("chooseCorrect()",index);
    // mark correct
    current.questions[index].correct++;
    // increment totalCorrect
    current.totalCorrect ++;
    // show message
    updateMsg('success', "Great Job!");
    // show confetti
    $('#confetti').show();
}
function chooseWrong(index,btn) {
    // console.log("chooseWrong()",index);
    // show message
    updateMsg('danger',"The correct answer is " + current.questions[index].possibleAnswers.answer);
    // show incorrect
    $(btn).removeClass("btn-secondary").addClass("btn-danger");
}

function restartQuiz() {
    // reset all data
    resetQuizData();
    // show intro
    showIntro();
}
// reset all and start new one 
restartQuiz(); 




/*  INTERFACE & MESSAGES
 ******************************************************************************/


function updateDisplay(){
    $('#score').html(current.totalCorrect );
}
function updateMsg(type, text) {
    console.log("updateMsg()",type,text)
    // set all others hidden
    $('.alert-success').html('');
    $('.alert-success').hide();
    $('.alert-warning').html('');
    $('.alert-warning').hide();
    $('.alert-danger').html('');
    $('.alert-danger').hide();
    if (type != '' && type != null && text != '') {
        // set this one
        $('.alert-' + type).html(text);
        $('.alert-' + type).show();
    }
}

function updateFunFact(index=null){
    if (index == null){
        $('.alert-info').html('');
        $('.alert-info').hide();  
    } else {
        $('.alert-info').html("<b>Fun fact:</b> "+ current.questions[index].data.funfacts[getRandomIndexFromArray(current.questions[index].data.funfacts)]);
        $('.alert-info').show();  
    }
}

$(document).on('click','#next',function(){
    if (current.questions[currentQuestionIndex].selected == false){
        alert("Please choose an answer first!");
    } else {
        // increment
        currentQuestionIndex++;
        if (currentQuestionIndex >= 10){
            showFinish();
        } else {
            // go next question
            showQuestion(currentQuestionIndex);
        }
    }
});

$(document).on('click','#restart',function(){
    restartQuiz();
});


$(document).on('click', '#easy, #hard', function(event) {
    let id = $(this)[0].id;
    $('#easy, #hard').removeClass("btn-primary").addClass("btn-secondary");
    $('#' + id).removeClass("btn-secondary").addClass("btn-primary");
    current.difficulty = id;
    // console.log(current);
});
$(document).on('click', '#birds, #insects, #butterflies', function(event) {
    let id = $(this)[0].id;
    $('#birds, #insects, #butterflies').removeClass("btn-primary").addClass("btn-secondary");
    $('#' + id).removeClass("btn-secondary").addClass("btn-primary");
    current.dataFile = id + "_data.json";
    loadJSON(current.dataFile);
    current.category = id;
    // console.log(current);
});
$(document).on('click', '#gotoQuiz', function(event) {
    gotoQuiz();
});






/*  GENERIC FUNCTIONS
 ******************************************************************************/

// get n random elements from array
function getRandomObjsFromArray(arr, n) {
    var result = new Array(n),
        len = arr.length,
        taken = new Array(len);
    if (n > len)
        throw new RangeError("getRandom: more elements taken than available");
    while (n--) {
        var x = Math.floor(Math.random() * len);
        result[n] = arr[x in taken ? taken[x] : x];
        taken[x] = --len in taken ? taken[len] : len;
    }
    return result;
}
// get n random props from obj
function getRandomPropsFromObj(obj, n) {
    var arr = [];
    for (var i=0; i<n; i++){
        var keys = Object.keys(obj);
        arr[i] = obj[keys[keys.length * Math.random() << 0]];
    }
    return arr;
}
// get n random UNIQUE props from obj
function getRandomUniqueFromObj(obj, n) {
    var arr = [],
        // save temp object so we can delete props as we use them
        tempObj = Object.assign({}, obj);
    for (var i=0; i<n; i++){
        var keys = Object.keys(tempObj);
        var r = keys[keys.length * Math.random() << 0];
        arr[i] = tempObj[r];
        // remove that prop
        delete tempObj[r];
        //console.log(keys);
    }
    return arr;
}
// get 1 random key from an object
function getRandomKeyFromObj(obj) {
    var keys = Object.keys(obj)
    return keys[ keys.length * Math.random() << 0];
};

// get n random elements from array
function getRandomIndexFromArray(arr) {
    return Math.floor(Math.random()*arr.length);
}
// get n random elements from array
function getRandomUniqueIndexesFromArray(arr,ignoreIndexes) {
    // copy values
    var tempArr = arr.slice();
    for (let i=0; i<ignoreIndexes.length; i++){
        // remove the index to ignore
        tempArr.splice(ignoreIndexes[i],1); 
    }
    // select random
    return Math.floor(Math.random()*tempArr.length);
}
// random number between 0 and max
function r(max){
    return Math.floor(Math.random()*max);
}
// return array of random numbers with no matches and different than the one given
function returnRandomUniqueNumbersArray(max,totalLength=4,ignoreIndex){
    // early escape
    let e =0,
        // new arr with index to ignore
        rArr = [ignoreIndex];
    // populate array, starting with 1st index (0 is ignoreIndex)
    for (let i=1; i<totalLength; i++){
        // get initial random value
        let temp = r(max);
        // loop until it is not found in rArr
         while (rArr.indexOf(temp) !== -1) {
            // make new if we need to
            temp = r(max);
            //console.log("while -> ",temp, rArr);
            // early escape (keep page from crashing)
            if (++e > 100) break;
        }
        // store value
        rArr[i] = temp;
    }
    // console.log("returnRandomUniqueNumbersArray()","max="+max,"totalLength="+totalLength,"ignoreIndex="+ignoreIndex,"max=",rArr)
    return rArr;
}
// shuffle object
function shuffleObject(obj){
    // new obj to return
    let newObj = {};
    // create keys array
    var keys = Object.keys(obj);
    // randomize keys array
    keys.sort(function(a,b) {return Math.random() - 0.5;});
    // save in new array
    keys.forEach(function(k) {
        newObj[k] = obj[k];
    });
    return newObj;
}

