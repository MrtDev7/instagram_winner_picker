<div class="modal mdllaccount fade" id="mdllregister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="tio clear"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('register')}}" method="GET">
                    <div class="form_account">
                        <div class="form-row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{__('main.user_name')}}</label>
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="{{__('main.user_name')}}"
                                                   required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{__('main.email_adress')}}</label>
                                            <input type="text" name="email" class="form-control"
                                                   placeholder="{{__('main.email_adress')}}"
                                                   required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-1 --password" id="show_hide_password">
                                            <label>{{__('main.password')}}</label>
                                            <div class="input-group">
                                                <input type="password" name="password" class="form-control"
                                                       data-toggle="password" placeholder="{{__('main.password')}}" required/>
                                                <div class="input-group-prepend hide_show">
                                                    <a href="#"><span
                                                            class="input-group-text tio hidden_outlined"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn mt-2 font-s-12 font-w-400 c-gray p-0">{{__('main.forget_password')}}</a>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <button type="submit"
                                                class="btn rounded-6 btn_xl_primary btn_login">{{__('main.register')}}</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
