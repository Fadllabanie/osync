<div>
    <div class="thumb">
        <div class="row">
            <form id="contact" action="{{ route('home.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="form-control" type="hidden" name="profile_type" value="adult">
                <input class="form-control" type="hidden" name="card_id" value="{{$card->id}}">
                <input class="form-control" type="hidden" name="category_id" value="{{$card->category_id}}">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-dec">
                            <img src="{{ asset('application/assets/images/contact-dec-v3.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="fill-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input class="form-control" type="file" name="avatar" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-2 ">
                                            <select name="prefix">
                                                <option selected>Open this
                                                    select menu</option>
                                                <option value="mr">MR
                                                </option>
                                                <option value="ms">MS
                                                </option>
                                            </select>

                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" field='first_name' name="first_name" id="first_name"
                                                placeholder="first Name" required
                                                value="{{ $profile->first_name }}" />
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="text" field='middle_name' name="middle_name"
                                                id="middle_name" placeholder="middle_name" required
                                                value="{{ $profile->middle_name }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" field='last_name' name="last_name" id="last_name"
                                                placeholder="last_name" required
                                                value="{{ $profile->last_name }}" />
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="text" field='nike_name' name="nike_name" id="nike_name"
                                                placeholder="nike_name ex: JONE" required
                                                value="{{ $profile->nike_name }}" />

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                     <div class="row">
                                        <div class="col-lg-3">
                                            <input type="email" field='email' name="email" id="email"
                                                placeholder="email" required value="{{ $profile->email }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="tel" field='mobile' name="mobile" id="mobile"
                                                placeholder="First Mobile" required value="{{ $profile->mobile }}" />
                                        </div>

                                      
                                     
                                    </div> 
                                </div>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input type="date" field='birthday' name="birthday" id="birthday"
                                                placeholder="birthday" required
                                                value="{{ $profile->birthday }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <select name="gender">
                                                <option selected disabled>
                                                    Open this select menu
                                                </option>
                                                <option value="1">Male
                                                </option>
                                                <option value="2">
                                                    Female</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="tel" field='home_phone' name="home_phone" id="home_phone"
                                                placeholder="home_phone"
                                                value="{{ $profile->home_phone }}" />
                                        </div>



                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input type="text" field='role' name="role" id="role"
                                                placeholder="role" required />
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" field='organization' name="organization"
                                                id="organization" placeholder="organization" required
                                                value="{{ $profile->organization }}" />

                                        </div>
                                        <div class="col-lg-3">
                                            <input type="url" field='organization_url' name="organization_url"
                                                id="organization_url" placeholder="organization website" required
                                                value="{{ $profile->organization_url }}" />


                                        </div>
                                        <div class="col-lg-3">

                                            <input type="text" field='organization_address'
                                                name="organization_address" id="organization_address"
                                                placeholder="organization_address" required
                                                value="{{ $profile->organization_address }}" />

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <input type="tel" field='work_mobile' name="work_mobile"
                                                id="work_mobile" placeholder="work_mobile" required
                                                value="{{ $profile->work_mobile }}" />
                                        </div>
                                         <div class="col-lg-4">
                                            <input type="tel" field='fax' name="fax"
                                                id="fax" placeholder="fax" required
                                                value="{{ $profile->fax }}" />
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="tel" field='work_phone' name="work_phone"
                                                id="work_phone" placeholder="work_phone" required
                                                value="{{ $profile->work_phone }}" />

                                        </div>
                                        <div class="col-lg-4">
                                            <input type="email" field='work_email' name="work_email"
                                                id="work_email" placeholder="work_email" required
                                                value="{{ $profile->work_email }}" />

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div id="group1" class="fvrduplicate">
                                        <div class="row entry">

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <select name="links_name[]">
                                                        <option selected>
                                                            Open this select
                                                            menu</option>
                                                        <option value="1">
                                                            One</option>
                                                        <option value="2">
                                                            Two</option>
                                                        <option value="3">
                                                            Three</option>
                                                    </select>

                                                </div>
                                                <div class="col-lg-4">
                                                    <input type="url" field='links_url[]' name="links_url[]"
                                                        id="links_url[]" placeholder="Url" required />
                                                </div>
                                                <div class="col-lg-4">
                                                    <button type="button" class="btn btn-success btn-sm btn-add">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button ">{{__("Save")}}</button>
                                    </fieldset>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
