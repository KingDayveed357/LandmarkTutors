<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LandmarkTutors | Quiz Game</title>
    <link rel="stylesheet" href="quiz.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    
</head>
<body>
    <div class="body">
        <div class="side">
            <!-- <br>
            <br>
            <br> -->
            <!-- <h1 class="js">Js</h1>
            <h1 class="oop">oop</h1> -->
            <img src="../assets/img/quiz2.jpg" alt="" class="image">
        </div>
        <main class="quizBox">
            <center style="background-color: white;">
                <div class="loader" style="background-color: white;" ></div>
            </center>
            <center style="background-color: white;">
                <div class="scoreDiv">
                    <h3>Your Quiz Score Of The Day</h3>
                    <h1 id="score"></h1>
                    <p id="remark"></p>
                    <div class='row '>
                    <div class="col-md-6">
                    <a href="quiz" class='playAgain'>Play-again</a>
                    </div>
                    <div class="col-md-6">
                    <a href="home" class='playAgain ' style="background-color: red;">Quit game</a>
                    <!-- <button
                          type="button"
                          class="btn btn-danger"
                          data-bs-toggle="modal"
                          data-bs-target="#smallModal"
                        >
                       Quit Game
                        </button>

                    <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-header ">
                            
                                <h5 class="modal-title" id="exampleModalLabel2">Are you sure?</h5>
                                <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                                ></button>
                                
                            </div>
                            <div class="modal-body text-center">
                                <img src="../assets/img/delete-img.png" style="width:45%" alt="">
                                <p class="mt-4">You are about to quit the game?</p>
                            </div>
                            <div class="mb-4  text-center" >
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Cancel
                              </button>
                              <a  href="home" class=" btn btn-danger">Quit Game</a>
                            </div>
                          </div>
                        </div>
                      </div> -->
                    </div>
                  </div>
                </div>
            </center>
            
           <div class="inside" style="background-color: white;">
            <div class="quiz" style="background-color: white;">
                <h1 style="background-color: white;">Quiz</h1>
            </div>
            <hr>
            <br>
            <br>
            <br >
            <div class="question" style="background-color: white;">
                <p id="questions" style="background-color: white;"></p>
                <br style="background-color: white;">
                <div  class="answer">
                    <button id="ans1" class="button" onclick="playQuiz()"></button>
                    <button id="ans2" class="button" onclick="playQuiz()"></button>
                </div>
                <div class="answer">
                    <button id="ans3" class="button" onclick="playQuiz()"></button>
                    <button id="ans4" class="button" onclick="playQuiz()"></button>
                </div>
            </div>
            <br>
            <br>
            <br>
            <hr>
        </div>
        <p class="numb" id="progress" style="background-color: white;">Question 1 of 10</p>
        
       
        </main>
        <audio id="right" src="../assets/img/success-fanfare-trumpets-6185.mp3"></audio>
        <audio id="wrong" src="../assets/img/notification-126507 (1).mp3"></audio>
        <audio id="endgame" src="../assets/img/short-success-sound-glockenspiel-treasure-video-game-6346.mp3"></audio>
    
  </div>
    <script src="quiz.js"></script>
</body>
</html>