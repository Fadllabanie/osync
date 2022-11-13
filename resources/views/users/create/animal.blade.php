    <div>
        <div class="thumb">
            <div class="row">
                <form id="contact" action="{{ route('home.profile.update')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input class="form-control" type="hidden" name="profile_type" value="animal">
                    <input class="form-control" type="hidden" name="card_id" value="{{$card->id}}">
                    <input class="form-control" type="hidden" name="category_id" value="{{$card->category_id}}">
    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-dec">
                                <img src="{{ asset('application/assets/images/contact-dec-v3.png') ?? '' }}"
                                    alt="">
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
                                            <div class="col-lg-6">
                                                <input type="text" field='anima_type' name="anima_type"
                                                    id="anima_type" placeholder="anima type dog - cat .. etc" required
                                                    value="{{ $profile->anima_type ?? '' }}" />
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" field='name' name="name" id="name"
                                                    placeholder="first Name" required
                                                    value="{{ $profile->name ?? '' }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input type="tel" field='home_phone' name="home_phone"
                                                    id="home_phone" placeholder="home phone" required
                                                    value="{{ $profile->home_phone ?? '' }}" />
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="tel" field='mobile' name="mobile"
                                                    id="mobile" placeholder="First owner mobile" required
                                                    value="{{ $profile->mobile ?? '' }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <select name="gender">
                                                    <option selected disabled>
                                                        {{ __('Gander') }}
                                                    </option>
                                                    <option value="1">{{ __('Male') }}
                                                    </option>
                                                    <option value="2">
                                                        {{ __('Female') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit"
                                                class="main-button ">{{ __('Save') }}</button>
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
