<?php

use Carbon\Carbon;

use App\Models\City;
use App\Models\Country;
use App\Models\Origin;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Admin;
use App\Models\Industry;
use App\Models\Profile;
use Webpatser\Uuid\Uuid;

use Illuminate\Support\Facades\Storage;

/**
 * Generate Code 
 */
if (!function_exists('generateRandomCode')) {
	function generateRandomCode($string)
	{
		return $string . '-' . substr(md5(microtime()), rand(0, 26), 5);
	}
}
/**
 * Generate Code 
 */
if (!function_exists('generateToke')) {
	function generateToke($admin_code,$category_name,$subcategory_name,$origin_code)
	{
		return utf8_encode($admin_code.substr($category_name,0,2)."_".substr($subcategory_name,0,2)."_".$origin_code."_".Uuid::generate());
	}
}

if (!function_exists('uploadToPublic')) {
	function uploadToPublic($folder, $image)
	{
		return  'uploads/'.Storage::disk('public_new')->put($folder, $image);
	}
}

if (!function_exists('isActive')) {
	function isActive($type, $end_date = "")
	{
		if ($type == 1 || $end_date >= now()) {
			return '<div class="badge badge-light-success fw-bolder">' . __("Active") . '</div>';
		} else {
			return '<div class="badge badge-light-danger fw-bolder">' . __("Not Active") . '</div>';
		}
	}
}
if (!function_exists('calculateAge')) {
	function calculateAge($birthday)
	{
		$age =  date_diff(date_create($birthday), date_create(date("d-m-Y")));
		return $age->format("%y");
	}
}

if (!function_exists('gender')) {
	function gender($type)
	{
		if ($type == 1) {
			return 'male';
		} elseif ($type == 2) {
			return 'female';
		}elseif ($type == 3) {
			return 'other';
		}
	}
}
/**
 * Upload
 */
if (!function_exists('upload')) {
	function upload($file, $path)
	{
		$baseDir = 'uploads/' . $path;

		$name = sha1(time() . $file->getClientOriginalName());
		$extension = $file->getClientOriginalExtension();
		$fileName = "{$name}.{$extension}";

		$file->move(public_path() . '/' . $baseDir, $fileName);

		return "{$baseDir}/{$fileName}";
	}
}

if (!function_exists('zip')) {
	function zip($files, $fileName)
	{
		$zip = new ZipArchive;
      
        if ($zip->open(storage_path("app/public/images/".$fileName), ZipArchive::CREATE) === TRUE)
        {
   
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
             
            $zip->close();
        }
    
        return response()->download(storage_path("app/public/images/".$fileName));
	}
}

if (!function_exists('cities')) {
	function cities()
	{
		$cities = City::get();
		return $cities;
	}
}
if (!function_exists('profileRole')) {
	function profileRole($user_id)
	{
		$roles = Profile::where('user_id',$user_id)->pluck ('role')->toArray();
		return $roles;
	}
}
if (!function_exists('countries')) {
	function countries()
	{
		$countries = Country::get();
		return $countries;
	}
}
if (!function_exists('categories')) {
	function categories()
	{
		$categories = Category::with('subcategories')->get();
		return $categories;
	}
}
if (!function_exists('subcategories')) {
	function subcategories()
	{
		$subcategories = Subcategory::get();
		return $subcategories;
	}
}
if (!function_exists('admins')) {
	function admins()
	{
		$admins = Admin::role('corporate admin')->get();
		return $admins;
	}
}
if (!function_exists('industries')) {
	function industries()
	{
		$industries = Industry::get();
		return $industries;
	}
}
if (!function_exists('origins')) {
	function origins()
	{
		$origins = Origin::get();
		return $origins;
	}
}
if (!function_exists('getCountry')) {
	function getCountry($city_id)
	{
		$city = City::whereId($city_id)->select('country_id')->first();
		return $city->country_id;
	}
}
if (!function_exists('isHidden')) {
	function isHidden($field,$array,$data)
	{
		if(empty($array)) return $data;
	 	return	in_array($field,$array) ? "" : $data;
	}
}


if (!function_exists('userSuspend')) {
	function userSuspend($type)
	{
		if ($type == true) {
			return '<a href="#"><div class="badge badge-light-danger fw-bolder">' .  __("Freeze")  . '</div></a>';
		} elseif ($type == false) {
			return '<a href="#"><div class="badge badge-light-success fw-bolder">' . __("Active"). '</div></a>';
		}
	}
}

if (!function_exists('userStatus')) {
	function userStatus($type)
	{
		if ($type == true) {
			return '<a href="#"><div class="badge badge-light-success fw-bolder">' . __("Active") . '</div></a>';
		} elseif ($type == false) {
			return '<a href="#"><div class="badge badge-light-danger fw-bolder">' . __("Inactive") . '</div></a>';
		}
	}
}

