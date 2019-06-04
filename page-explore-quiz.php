<?php
/**
 * Template Name: Explore Quiz
 * Used for the Explore Quiz page ONLY
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>


<div class="wrapper wrapper-hero">
    <div class="container quiz-wrapper">


        <div class="row">
            <div class="col-12 text-center px-0">
                <h3>Explore Nature Quiz</h3>
                <p>Test your knowledge of nature in Davidson!</p>
            </div>
        </div>

        <canvas id="confetti"></canvas>

        <div class="content-wrapper">

            <pre></pre>


            <div class="row" id="quizIntro">

                <div class="col-md-7">
                    <img src="/wp/wp-content/themes/davidsonlands-theme/img/quiz-section-image.png">
                </div>
                <div class="col-md-5">

                    <div class="alerts">
                        <div class="alert alert-success" role="alert"></div>
                        <div class="alert alert-warning" role="alert"></div>
                        <div class="alert alert-danger" role="alert"></div>
                    </div>

                    <h4 class="mt-5">Choose Difficulty</h4>

                    <div class="difficultyButtons">
                        <a class="btn btn-secondary" id="easy">
                            <h5>Easy</h5>
                        </a>
                        <a class="btn btn-secondary" id="hard">
                            <h5>Hard</h5>
                        </a>
                    </div>



                    <h4 class="mt-4">Choose Category</h4>

                    <div class="CategoryButtons">
                        <a class="btn btn-secondary" id="birds">
                            <h5>Birds</h5>
                        </a>
                        <a class="btn btn-secondary" id="insects">
                            <h5>Insects</h5>
                        </a>
                        <a class="btn btn-secondary" id="butterflies">
                            <h5>Butterflies</h5>
                        </a>
                    </div>


                    <a class="btn btn-primary mt-5" id="gotoQuiz">
                        <h4>Go To Quiz</h4>
                    </a>

                </div>
            </div>



            <div id="quiz">


                <div class="row" id="quizBody">
                    <div class="col-md-6">
                        <img id="image" src=""  class="quiz-image img-fluid">
                    </div>
                    <div class="col-md-6"> 

                        <h2 id="question">Question...</h2>
                       
                        <div class="alerts">
                            <div class="alert alert-success" role="alert"></div>
                            <div class="alert alert-danger" role="alert"></div>
                        </div>


                        <div class="buttons">
                            <a class="btn btn-secondary quiz-choice" id="choice1"></a> 
                            <a class="btn btn-secondary quiz-choice" id="choice2"></a>
                            <a class="btn btn-secondary quiz-choice" id="choice3"></a>
                            <a class="btn btn-secondary quiz-choice" id="choice4"></a>
                        </div>

                        <div class="alerts">
                            <div class="alert alert-info" role="alert"></div>
                        </div>

                    </div>
                </div>



                <div class="row mt-4" id="quizFooter">
                    <div class="col-12 text-center">
                        <div>
                            <a class="btn btn-secondary" id="back"><h4>Back</h4></a>
                            <span id="progress" class="mx-3">Question x of y</span>
                            <a class="btn btn-secondary" id="next"><h4>Next</h4></a>
                        </div>

                    </div>
                </div>

            </div><!-- /quiz -->



            <div class="row" id="quizFinish">

                <div class="col-md-7">
                    <img src="/wp/wp-content/themes/davidsonlands-theme/img/quiz-section-image.png">
                </div>
                <div class="col-md-5">

                    <h2 class="mt-5 outcome-score"></h2>
                    <h4 class="outcome"></h4>

                    <a class="btn btn-secondary mt-4" id="restart"><h4>Try again?</h4></a>

                </div>
            </div>








        </div><!-- /content-wrapper -->


    </div>
</div>




<?php get_footer(); ?>