 <!-- [id] content -->
 <footer class="default_footer dark padding-t-12" id="contactus">
     <div class="container">
         <img class="shape_overlay" src="{{ asset('img/logo.svg') }}" />
         <div class="row">
             <div class="col-lg-5 margin-b-3">
                 <div class="title_sections margin-b-2">
                     <h2>{{__('main.need_help')}}</h2>
                     <p>
                        {{__('main.contact_sub_title')}}
                     </p>
                 </div>
                 <div class="dashed-line margin-b-2"></div>

             </div>
             <div class="col-lg-5 mx-auto" id="">
                 <div class="form_register">
                     <div class="form-row">
                         <h3 class="title--forms">{{__('main.contact_title')}}</h3>
                         <div class="col-12">
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group">
                                         <label>{{__('main.full_name')}}</label>
                                         <input type="text" class="form-control" placeholder="{{__('main.full_name')}}" />
                                     </div>
                                 </div>

                                 <div class="col-md-12">
                                     <div class="form-group">
                                         <label>{{__('main.email_adress')}}</label>
                                         <input type="email" class="form-control" placeholder="{{__('main.email_adress')}}" />
                                     </div>
                                 </div>

                                 <div class="col-md-12">
                                     <div class="form-group">
                                         <label>{{__('main.message')}}</label>
                                         <textarea type="text" class="form-control"
                                             placeholder="{{__('main.message')}}"></textarea>
                                     </div>
                                 </div>


                                 <div class="col-12">
                                     <a href=""
                                         class="btn mt-3  btn_sm_primary c-white rounded-pill bg-blue">
                                         {{__('main.send')}}</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Forms -->
             </div>
         </div>
         <!-- Start footer -->
         <div class="defalut-footer padding-py-12">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="item_about">
                        <a class="logo" href="sass-products.html">
                            <img src="{{ asset('img/logo.svg') }}" alt="" />
                        </a>
                        <p>
                        {{__('main.web_site_description')}}
                        </p>

                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-4">
                    <div class="item_links">
                        <a class="nav-link" href="{{$config->facebook_page}}">Facebook</a>
                        <a class="nav-link" href="{{$config->twitter_page}}">twitter</a>
                        <a class="nav-link" href="{{$config->insta_page}}">instagram</a>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-4">
                    <div class="item_links">
                        <a class="nav-link" href="">{{__('main.about_title')}}</a>

                        <a class="nav-link" href="/{{LaravelLocalization::getCurrentLocale() }}/privacy">{{__('main.legal&privacy')}}</a>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 margin-t-1">

                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                      @if (LaravelLocalization::getCurrentLocale() !== $localeCode  )
                      <a rel="alternate" hreflang="{{ $localeCode }}"
                      href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                      class="btn btn_sm_primary p  bg-blue c-white rounded-8 routlined m-4">
                      <i class="tio globe mr-1 align-middle font-s-16"></i>
                      <span>
                          {{ $properties['native'] }}
                      </span>
                  </a>
                      @endif
                    @endforeach

                </div>
            </div>
            <div class="col-12 text-center padding-t-6">
                <div class="copyright">
                    <span>© {{now()->year}}
                        <a href="#" target="_blank">ReDeV</a>
                        {{__('main.allrightreseved')}}</span>
                </div>
            </div>
        </div>
        <!-- End Footer -->
     </div>
 </footer>
