@extends('layout.app')



@section('content')
<main data-spy="scroll" data-target="#navbar-example2" data-offset="0">


    <!-- Start Banner Section -->
    <section class="demo_1 banner_section" id="home">
        <div class="container">
            <div class="row justify-content-md-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="banner_title margin-b-5">
                        <h1>{{ $config->name }}</h1>
                        <p>
                            <span class="color-blue"> </span> {{ __('main.web_site_description') }}

                        </p>


                        @guest()
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#mdllregister">
                            {{ __('main.register') }}
                        </button>

                        <a data-toggle="modal" data-target="#mdllLogin" data-target="#mdllLogin"
                            class="btn scale btn_sm_primary bg-blue c-white rounded-pill">
                            {{ __('main.sign_in') }}
                        </a>
                        @endguest

                        @auth()
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <a href="/{{ LaravelLocalization::getCurrentLocale() }}/instagram-comment-winner-picker"
                                        class="card" style="padding: 60px 0; background: white;border-radius: 15px">
                                        <div class="img">
                                            <img src="https://cdn1.iconfinder.com/data/icons/social-media-outline-6/128/SocialMedia_Instagram-Outline-512.png"
                                                style="height: 50px;" alt="">
                                        </div>
                                        <br><br>
                                        <div class="">instagram giveaway</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endauth


                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Banner -->

    <!-- Start Services -->
    <section class="services_section margin-b-6 padding-t-12" id="Services">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8 col-lg-6 text-center">
                    <div class="title_sections">
                        <div class="before_title ">
                            <span> {{ __('main.working_process') }}
                            </span>

                        </div>
                        <h2>{{ __('main.working_process_sub_title') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="items_serv" data-aos="fade-up" data-aos-delay="0">
                        <div class="media">

                            <div class="media-body">
                                <div class="txt-small">
                                    <span>{{ __('main.step_1') }}</span>
                                </div>
                                <h3>{{ __('main.step_1_title') }}</h3>
                                <p>
                                    {{ __('main.step_1_content') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="items_serv" data-aos="fade-up" data-aos-delay="100">
                        <div class="media">

                            <div class="media-body">
                                <div class="txt-small">
                                    <span>{{ __('main.step_2') }}</span>
                                </div>
                                <h3>{{ __('main.step_2_title') }}</h3>
                                <p>
                                    {{ __('main.step_2_content') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="items_serv" data-aos="fade-up" data-aos-delay="200">
                        <div class="media">

                            <div class="media-body">
                                <div class="txt-small">
                                    <span> {{ __('main.step_3') }}
                                    </span>
                                </div>
                                <h3> {{ __('main.step_3_title') }}
                                </h3>
                                <p>
                                    {{ __('main.step_3_content') }}

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services -->

    <!-- Start Pricing -->
    <section class="pricing_section  margin-b-6 padding-t-12" id="Pricing">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8 col-lg-6 text-center">
                    <div class="title_sections_inner margin-b-5">
                        <h2>{{__('main.our_plans')}}</h2>

                    </div>
                </div>
            </div>
            <div class="blocks_pricing">
                <div class="row">
                    @foreach ($packs as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="item__price border-0 slide-in-left">
                                <div class="logo_price" style="height: 50px">

                                </div>
                                <h4 class="name_pack">
                                    @if (LaravelLocalization::getCurrentLocaleName() === 'English')
                                        {{ $item->name_en}}
                                    @else
                                        {{ $item->name_ar}}
                                    @endif
                                </h4>
                                <p class="info_price">

                                    @if (LaravelLocalization::getCurrentLocaleName() === 'English')
                                        {{$item->description_en}}

                                    @else
                                        {{ $item->description_ar}}
                                    @endif
                                </p>
                                <div class="number">
                                    <span class="n_price">

                                        {{$item->price}}$

                                    </span>
                                    <span class="duration"> {{$item->point}} {{__('main.point')}}</span>
                                </div>
                                <div class="feature_price">
                                    <button type="button" class="btn  btn_md_primary rounded-8 c-white bg-blue">
                                        {{__('main.select_plan')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Start Pricing -->


    <!-- Start FAQ -->
    <section class="faq_section">
        <div class="container">
            <div class="padding-t-12" id="faq">
                <div class="row justify-content-md-center">
                    <div class="col-md-8 col-lg-6 text-center">
                        <div class="title_sections">
                            <div class="before_title">
                                <span>{{ __('main.faq') }}</span>
                            </div>
                            <h2>{{ __('main.ask_something') }}</h2>
                        </div>
                    </div>
                </div>
                <!-- block Collapse -->
                <div class="block_faq">
                    <div class="accordion" id="accordionExample">
                        <div class="row justify-content-md-center">
                            <div class="col-lg-10">
                                @foreach ($faq as $item)
                                <div class="card">
                                    <div class="card-header" id="heading{{ $item->id }}">
                                        <h3 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapse{{ $item->id }}" aria-expanded="true"
                                                aria-controls="collapse{{ $item->id }}">
                                                @if (LaravelLocalization::getCurrentLocaleName() === 'English')
                                                {{$item->en_name}}
                                                @else
                                                {{$item->ar_name}}
                                                @endif
                                            </button>
                                        </h3>
                                    </div>

                                    <div id="collapse{{ $item->id }}" class="collapse show"
                                        aria-labelledby="heading{{ $item->id }}" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>

                                                @if (LaravelLocalization::getCurrentLocaleName() === 'English')
                                                    {{ $item->description_en }}

                                                @else
                                                {{$item->description_ar}}
                                                @endif
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQ -->



</main>
@endsection
