@extends('layout.app')


@section('content')

<style>
    .picker-container {
        background-color: #ffffff;
        border-radius: 8px;
        padding: 2.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 500px;
        border: 1px solid #DBDBDB;
        transition: all .4s ease;
    }

    #post-img {
        width: 100%;
        border-radius: 10px
    }

    .post-img-container {
        margin-bottom: 20px;
    }

    #error-area {
        color: red;
        display: flex;
        height: 500px;

    }

    #timer {
        color: red;
        display: flex;
        align-items: center;
        height: 500px;
        font-weight: bold;
        font-size: 85px;
    }
</style>




<!-- Start Banner Section -->
<section class="demo_1 banner_section margin-t-4 margin-b-12" id="home">
    <div class="container">
        <div class="row justify-content-md-center text-center">
            <div class="col-md-8 col-lg-8">
                <div class="banner_title margin-b-2 align-content-center">
                    <h1>Instagram Comment Picker and Giveaways </h1>

                    <div class="picker-container">
                        <div id="search-area">

                            <img src="https://cdn1.iconfinder.com/data/icons/social-media-outline-6/128/SocialMedia_Instagram-Outline-512.png" style="height: 50px;" alt="">
                            <br>
                            <span id="error-text" style="color: red"></span>

                            <br>


                            <p>
                                <span> {{ __('main.insta_description') }}</span>

                            </p>
                            <br>
                            <input id="scanner-text" type="text" value="https://www.instagram.com/p/CJ_Oa_Vn7_C/" class="form-control outline margin-b-1" style="box-shadow: none !important;
                                                                                                                                border-color: #165df5;height: 55px; border-radius: 100px" placeholder="ex. https://www.instagram.com/p/POSTID/">


                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <label style="font-size: 15px"> {{ __('main.comment_count') }}
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <input type="number" style="text-align: center;width: 75px;padding-left: 8px;border-radius: 15px;color: #127fad;height: 30px;border: 1px solid #127fad;" id="comment-count" min="1" value="100">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button onclick="getComments()" type="button" style="width: 120px" class="btn scale rounded-pill btn-video btn_video">
                                {{ __('main.scan') }}
                            </button>
                        </div>
                        <div id="comments-area" style="display: none">
                            <h3> {{ __('main.giveaway_condition') }}
                            </h3>

                            <div class="container margin-t-6" style="display: flex">

                                <div class="row">
                                    <div class="col-6 col-12 col-md-6 col-lg-6">
                                        <div class="post-img-container">
                                            <img id="post-img" src="" />
                                        </div>
                                    </div>
                                    <div class="spacer"></div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <span>{{ __('main.comment_count') }}<strong id="count"></strong></span>
                                        <br>
                                        <br>
                                        <div class="container-fluid">
                                            <div class="row">


                                                <div class="col-8">
                                                    <label style="font-size: 15px">{{ __('main.number_of_minimum_mention') }}</label>
                                                </div>
                                                <div class="col-4">
                                                    <input type="number" style="text-align: center;width: 75px;padding-left: 8px;border-radius: 15px;color: #127fad;height: 30px;border: 1px solid #127fad;" id="min-mention" min="0" value="0">
                                                </div>

                                                <br>
                                                <br>
                                                <div class="col-8">
                                                    <label style="font-size: 15px">{{ __('main.number_of_winners') }}
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <input type="number" id="winner" min="1" value="1" style="text-align: center;width: 75px;padding-left: 8px;border-radius: 15px;color: #127fad;height: 30px;border: 1px solid #127fad;">
                                                </div>

                                                <br>
                                                <br>
                                                <div class="col-8">
                                                    <label style="font-size: 15px">{{ __('main.timer') }}
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <input type="number" id="timer-value" min="1" value="1" style="text-align: center;width: 75px;padding-left: 8px;border-radius: 15px;color: #127fad;height: 30px;border: 1px solid #127fad;">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <button onclick="startGiveAway()" type="button" style="width: 200px;" class="btn scale rounded-pill btn-video btn_video margin-t-6">
                                {{ __('main.find_a_winner') }}
                            </button>



                        </div>
                        <div id="winners-area" class="container" style="display: none">
                            <h3> {{ __('main.winner') }}
                            </h3>
                            <div id="winners" class=" row justify-content-center">

                            </div>
                        </div>
                        <div id="error-area" class="container" style="display: none;">
                            <div class="d-flex justify-content-center  align-self-center  " style="flex-direction: column;">
                                <div style="color:red">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, minima ullam impedit iste quam sapiente, quibusdam voluptatem ratione maxime harum, accusamus odit corporis veritatis sed vitae veniam rem natus laudantium!</div>

                                <div class="d-flex justify-content-center"> <button id="error-btn" class="btn  scale rounded-pill btn-video btn_video margin-t-4" style="width: 150px;"> try again </button>
                                </div>
                            </div>
                        </div>
                        <div id="timer" style="display: none;">

                            <div class="seconds video-btn">
                                -
                            </div>




                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


@endsection