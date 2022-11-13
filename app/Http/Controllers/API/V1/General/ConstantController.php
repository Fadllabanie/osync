<?php

namespace App\Http\Controllers\API\V1\General;

use App\Models\Faq;
use App\Models\City;
use App\Models\Country;
use App\Models\Industry;
use App\Models\Platform;
use App\Models\Nationality;
use App\Http\Controllers\Controller;
use App\Http\Resources\Constants\FaqResource;
use App\Http\Resources\Constants\CityResource;
use App\Http\Resources\Constants\ConstResource;
use App\Http\Resources\Constants\CountryResource;
use App\Http\Resources\Constants\IndustryResource;
use App\Http\Resources\Constants\PlatformResource;
use App\Http\Resources\Constants\NationalityResource;
use Illuminate\Http\Request;

class ConstantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCity(Request $request)
    {
        $data = City::where('country_id',$request->country_id)->get();

        return $this->respondWithCollection(CityResource::collection($data));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCountry()
    {
        $data = Country::get();

        return $this->respondWithCollection(CountryResource::collection($data));
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFaq()
    {
        $data = Faq::get();
       
        return $this->respondWithCollection(FaqResource::collection($data));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndustry()
    {
        $data = Industry::get();
       
        return $this->respondWithCollection(IndustryResource::collection($data));
    }  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPlatform()
    {
        $data = Platform::get();
       
        return $this->respondWithCollection(PlatformResource::collection($data));
    }
   
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreationConst()
    {
        $data['cities'] = City::get();
        $data['countries'] = Country::get();

        return $this->respondWithCollection(new ConstResource($data));
    }
}
