<div>
    <div class="thumb">
        <div class="row">
            <form id="contact" action="{{ route('home.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="form-control" type="hidden" name="profile_type" value="child">
                <input class="form-control" type="hidden" name="card_id" value="{{$card->id}}">
                <input class="form-control" type="hidden" name="category_id" value="{{$card->category_id}}">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-dec">
                            <img src="{{ asset('application/assets/images/contact-dec-v3.png') ?? '' }}" alt="">
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
                                        <div class="col-lg-4">
                                            <input type="text" field='first_name' name="first_name" id="first_name"
                                                placeholder="first Name" required
                                                value="{{ $profile->first_name ?? '' }}" />
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="text" field='last_name' name="last_name" id="last_name"
                                                placeholder="last name" required
                                                value="{{ $profile->last_name ?? '' }}" />
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="text" field='nike_name' name="nike_name" id="nike_name"
                                                placeholder="nike name" required
                                                value="{{ $profile->nike_name ?? '' }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <input type="tel" field='home_phone' name="home_phone" id="home_phone"
                                                placeholder="home phone" required
                                                value="{{ $profile->home_phone ?? '' }}" />
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="tel" field='mobile' name="mobile" id="mobile"
                                                placeholder="First mobile" required
                                                value="{{ $profile->owner_mobile ?? '' }}" />
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="date" field='birthday' name="birthday" id="birthday"
                                                placeholder="birthday" required
                                                value="{{ $profile->birthday ?? '' }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-2">
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
                                        <div class="col-lg-2">
                                            <select name="blood_type">
                                                <option selected disabled>
                                                    {{ __('blood_type') }}
                                                </option>
                                                <option value="A+">{{ __('A+') }}
                                                </option>
                                                <option value="A-">
                                                    {{ __('A-') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="tel" field='home_address' name="home_address"
                                                id="home_address" placeholder="home_address" required
                                                value="{{ $profile->home_address ?? '' }}" />
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="tel" field='school_address' name="school_address"
                                                id="school_address" placeholder="school_address" required
                                                value="{{ $profile->school_address ?? '' }}" />
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
