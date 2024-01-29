<?php

use Blogs\Models\BlogComment;
use ModelAttachments\Models\ModelAttachment;
use Pages\Models\Page;
use SocialMedia\Models\SocialMedia;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Areas\Models\Area;
use Countries\Models\Country;
use UnitAvailability\Models\UnitAvailability;
use Breadcrumb\Models\Breadcrumb;
use Cities\Models\City;
use Countries\Models\Nationality;
use CustomersSubscriptions\Models\CustomerSubscribe;
use Finance\Models\FinanceRequest;
use Illuminate\Support\Facades\URL;
use MainSettings\Models\MainSetting;
use Portfolio\Models\Portfolio;
use Properties\Models\Property;
use Properties\Models\PropertyGallery;
use Properties\Models\PropertyPlan;
use Properties\Models\PropertyRent;
use Properties\Models\PropertyVideo;
use Sections\Models\Section;
use Services\Models\Service;
use Services\Models\ServiceGallery;
use Services\Models\ServicePriceList;
use Technology\Models\Technology;
use Tenants\Models\Tenants;
use Tenants\Models\TenantUnit;
use Tenants\Models\TenantUnitRent;
use Translates\Models\Language;
use UnitGroup\Models\UnitGroup;
use UnitGroup\Models\UnitGroupProperty;
use UnitSections\Models\UnitSection;
use UnitTypes\Models\UnitType;
use UnitTypes\Models\UnitTypeAttribute;
use Wishlists\Models\Wishlist;

// use Auth;




function makePagination($resouce,$total,$route)
{
    $current_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    $next_page = $current_page + 1;
    $prev_page = ($current_page == 1) ? 0 : ($current_page - 1);
    $prev_page_link = ($prev_page > 0) ? strval($prev_page) : null;
    $next_page_link = ($resouce->lastPage() > $current_page) ? strval($next_page) : null;
    return [
        'total' => strval($total),
        'prev_page' => $prev_page_link,
        'next_page' => $next_page_link,
        'current_page' => strval($current_page),
        'per_page' => config('app.pagination')
    ];
}



function BuildFields($name , $value = null , $type="text" ,$other = null ,$model = null){
    $lang = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLanguagesKeys();
    $out = "";
    if($other != null)
    {
        $others = "";
        foreach($other as $key => $o){
            $others .= "$key ='$o' ";
        }
    }else{
        $others = null;
    }
    foreach($lang as  $key => $lan){
        // dd($model->translate($lan)->$value);
        $newValue = $value != null ? $model->translate($lan)->$value : null;
        $label_name = ucfirst($name).' ['.$lan.']';
        if (str_contains($name, '_')) {
            $label_name = ucwords(str_replace('_',' ',$name)).' ['.$lan.']';
        }
        $out .='<div class="col-lg-6" style="margin-bottom:10px;">';
        $out .='<label for="'.$name.'['.$lan.']" >'.$label_name.'</label >';
        if($type != 'textarea'){
            $out .='<input type = "'.$type.'" class="form-control"  name="'.$name.'['.$lan.']" id = "'.$name.'['.$lan.']" placeholder="'.$name.' in '.$lan.'" '.$others.' value="'.$newValue.'"  />';
        }else{
            $out .='<textarea name="'.$name.'['.$lan.']" id="'.$name.'['.$lan.']" class="form-control ckeditor">'.$newValue.'</textarea>';
        }
        $out .='</div>';
    }
    return $out;
}


function getDir()
{
      return \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection();
}

function getDirection()
{
      $cD = getDir();
      return $cD == 'rtl' ? 'right' : 'left';
}

function getReverseDirection()
{
      $cD = getDir();
      return $cD == 'rtl' ? 'left' : 'right';
}

function checkIfLinkyouTube($url){
    $rx = '~
                ^(?:https?://)?              # Optional protocol
                 (?:www\.)?                  # Optional subdomain
                 (?:youtube\.com|youtu\.be)  # Mandatory domain name
                 /watch\?v=([^&]+)           # URI with video id as capture group 1
                 ~x';
    $has_match = preg_match($rx,  $url , $matches);
    if(isset($matches[1]) && $matches[1] != ''){
      return true;
    }else{
        return false;
    }
}


function statisticsWidget($data){
    $statisticsHtml = '';
    for ($i=0; $i < count($data); $i++) {
        ($data[$i][3] == '') ? $data[$i][3] = 'azura' : $data[$i][3] = $data[$i][3];
        if (hasPermissionsStatistics($data[$i][4]) != 'hasnot' && hasPermissionsStatistics($data[$i][4]) != 'notfound') {
            $statisticsHtml .= '
            <div class="col-md-2">
                <div class="card card-bordered card-full">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-0">
                            <div class="card-title">
                                <h6 class="subtitle">'.$data[$i][1].'</h6>
                            </div>
                        </div>
                        <div class="card-amount">
                            <span class="amount"><em class="icon ni ni-'.$data[$i][2].'"></em> '.$data[$i][0].' </span>
                        </div>
                    </div>
                </div>
            </div>

            ';
        }

    }
    return $statisticsHtml;
}

function breadcrumbWidget($currentPageName,$pages){
    $breadcrumb = '';
    if (count($pages) == 0) {
        $breadcrumb = '<h1>'.$currentPageName.'</h1>';
    }else{
        $breadcrumb .= '
        <h1>'.$currentPageName.'</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">';
            $breadcrumb .= '<li class="breadcrumb-item"><a href="'.route("home").'">'.transWord('Home').'</a></li>';
            for ($i=0; $i < count($pages); $i++) {
                if ($pages[$i][1] == '' || $pages[$i][1] == '#') {
                    $breadcrumb .= '<li class="breadcrumb-item"><a href="">'.$pages[$i][0].'</a></li>';
                }else if(is_array($pages[$i][1])){
                    $breadcrumb .= '<li class="breadcrumb-item"><a href="'.route($pages[$i][1][0],$pages[$i][1][1]).'">'.$pages[$i][0].'</a></li>';
                }else{
                    $breadcrumb .= '<li class="breadcrumb-item"><a href="'.route($pages[$i][1]).'">'.$pages[$i][0].'</a></li>';
                }
            }
            $breadcrumb .= '</ol>
        </nav>
        ';
    }
    return $breadcrumb;
}

function getLang(){
    $lang = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLanguagesKeys();
    return $lang;
}

function datatableLang(){
    $lang = \Lang::getLocale();
    if($lang == 'ar')
        return '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json';
    else
        return '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json';
}

function menuActive($name,$arrange){
    if(request()->segment($arrange) == $name){
        return "active";
    }
}

function getUserRole($userId){
    $user = User::findOrfail($userId);
    $roles = [];
    foreach ($user->getRoleNames() as $role) {
        array_push($roles,$role);
    }
    return $roles;
}

function getDataFromJson($json){
    $data = json_decode($json, true);
    return $data;
}

function getDataFromJsonByLanguage($json){
    $lang = \Lang::getLocale();
    $data = json_decode($json, true)[$lang];
    return $data;
}

function changeLanguageMenu(){
    $menu = '';
    $flag = '';
    foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties){
        $menu .= '<a href="'.LaravelLocalization::getLocalizedURL($localeCode, null, [], true).'" class="dropdown-item notify-item">';
            $menu .= '<img src="'.asset("dashboard/assets/images/flags/".$localeCode.".jpg").'" alt="user-image" class="mr-1" height="12">';
            $menu .= '<span class="align-middle">'.$properties["native"].'</span>';
        $menu .= '</a>';
    }
    return $menu;
}

function checkHasValue($data){
    if (isset($data)) {
        if ($data != null) {
            return $data;
        }
    }
}


function mainSettingKey($key)
{
    $main_settings = \MainSettings\Models\MainSetting::all();
    if ($main_settings != null) {
        foreach ($main_settings as $main) {
            if ($main->setting_k == $key) {
                return $main->setting_v;
                break;
            }
        }
    }
}

function saveMainSettingKey($key,$value)
{
    $main_settings = \MainSettings\Models\MainSetting::all();
    if ($main_settings != null) {
        foreach ($main_settings as $main) {
            if ($main->setting_k == $key) {
                $s =  \MainSettings\Models\MainSetting::findOrfail($main->id);
                $s->setting_v = $value;
                $s->save();
                break;
            }
        }
    }
}

function transWord($word){
    $lang = \Lang::getLocale();
    if(\Translates\Models\Translate::where('word',$word)->where('key',$lang)->count() > 0){
        $transData = \Translates\Models\Translate::where('word',$word)->where('key',$lang)->get()->first();
        return $transData->translation;
    }else{
        return $word;
    }
}

function convertToTags($text){
    if(strpos($text,",") != null){
        $tags = explode(',',$text);
        $tags_html = '';
        foreach ($tags as $tag) {
            $tags_html .= '<span class="badge bg-secondary">'.$tag.'</span>';
        }
        return $tags_html;
    }else{
        return '<span class="badge bg-secondary">'.$text.'</span>';
    }
}

function hasPermissions($permission){
    $getPermission = Permission::where('name',$permission)->limit(1)->count();
    if ($getPermission > 0) {
        if(!Auth::user()->hasPermissionTo($permission))
            abort(403);
    }else{
        abort(404);
    }
}

function hasPermissionsStatistics($permission){
    $getPermission = Permission::where('name',$permission)->limit(1)->count();
    if ($getPermission > 0) {
        if(!Auth::user()->hasPermissionTo($permission))
            return 'hasnot';
    }else{
        return 'notfound';
    }
}

function changeLanguage()
{
    $lang = \DB::select('select lang from main_settings where id = 1')[0]->lang;
    App::setLocale($lang);
}


function setPublic()
{
    $link = URL::asset('/');
    if($_SERVER['REMOTE_ADDR'] != '127.0.0.1')
    {
        return $link."public/";
    }else{
        return $link;
    }
}

function daysWithName($start_date,$end_date)
{
    $from_date =$start_date;
    $to_date =$end_date;
    $days = [];

    $from_date = new DateTime($from_date);
    $to_date = new DateTime($to_date);

    for ($date = $from_date; $date <= $to_date; $date->modify('+1 day')) {
        $days [$date->format('d-m-Y')] = $date->format('l');
    }

    return $days;
}

function searchInJsonData($model,$col,$search)
{
    $model_data = $model::all();
    $search_array = [];
    foreach ($model_data as $value) {
        $col_data = (array)json_decode($value->$col);
        if (in_array($search,$col_data)) {
            $search_array [] = $value->id;
        }
    }
    return $search_array;
}


function socialMediaShare($url)
{
    $socials = [
        'facebook' => [
            'uri' => 'https://www.facebook.com/sharer/sharer.php?u='.$url,
            'icon' => 'facebook'
        ],
        'twitter' => [
            'uri' => 'https://twitter.com/intent/tweet?url='.$url,
            'text' => 'Default share text',
            'icon' => 'twitter'
        ],
        'linkedin' => [
            'uri' => 'https://www.linkedin.com/sharing/share-offsite?url'.$url,
            'extra' => ['mini' => 'true'],
            'icon' => 'linkedin'
        ],
        'whatsapp' => [
            'uri' => 'https://wa.me/?text='.$url,
            'extra' => ['mini' => 'true'],
            'icon' => 'whatsapp'
        ],
        'pinterest' => [
            'uri' => 'https://pinterest.com/pin/create/button/?url='.$url,
            'icon' => 'pinterest'
        ],
        'reddit' => [
            'uri' => 'https://www.reddit.com/submit?url='.$url,
            'text' => 'Default share text',
            'icon' => 'reddit'
        ],
        'telegram' => [
            'uri' => 'https://telegram.me/share/url?url='.$url,
            'text' => 'Default share text',
            'icon' => 'telegram'
        ],
    ];

    return $socials;
}

function main_settings()
{
    $mains = MainSetting::first();
    return $mains->main_value;
}

function menuToggle($name,$arrange){
    if(request()->segment($arrange) == $name){
        return "open";
    }else{
        return "";
    }
}

function currentDir()
{
   return Language::where('code',\Lang::getLocale())->first()->direction;
}

function menuOpen($name,$arrange){
    if(request()->segment($arrange) == $name){
        return "open";
    }
}

function genSlug($string,$lang){
    if ($lang == 'ar') {
        $slug = trim($string);
        $slug = preg_replace('/[^\p{Arabic}\da-z-]/ui', '-', $string);
        $slug= strtolower($slug);
        return $slug;
    }else{
        $slug = trim($string);
        $slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug );
        $slug= str_replace(' ','-', $slug);
        $slug= strtolower($slug);
        return $slug;
    }
}


function returnCreatedBy($prop){
    switch($prop->created_by_type){
        case 'broker':
            $created_by =[
                'created_by' => $prop->created_by_type,
                'created_msg' => ($prop->office ? $prop->office->phone_code : '' ) . ( $prop->office ? $prop->office->mobile_number : ''),
            ];
            break;
        case 'owner':
            $created_by =[
                'created_by' => $prop->created_by_type,
                'created_msg' => transWord('schedule an Appointment')
            ];
            break;

        case 'admin':
            $created_by =[
                'created_by' => $prop->created_by_type,
                'created_msg' => transWord('Schedule an Appointment')
            ];
            break;
        default:
            $created_by = [
                'created_by' => null,
                'created_msg' => null
            ];
            break;
    }
    return $created_by;
}


function allProperties($properties,$gets = null,$type = null){
    $data = [];
    $isFav = 0;

    // $property_plan = [];

    if ($type != 'single') {
        foreach ($properties as $prop) {
            if (auth('sanctum')->user() != null) {
                $property_plan_data = PropertyPlan::where('user_id',auth('sanctum')->user()->id)->where('property_id',$prop->id)->first();
                if ($property_plan_data != null && $property_plan_data->plan != null) {
                    $property_plan['id'] = $property_plan_data->plan->id;
                    $property_plan['type'] = ($property_plan_data->plan->price > 0) ? 'paid' : 'free';
                    $property_plan['name'] = $property_plan_data->plan->name;
                    $property_plan['content'] = $property_plan_data->plan->content;
                    $property_plan['rent_date'] = $property_plan_data->rent_date;
                    $property_plan['next_rent_date'] = $property_plan_data->next_rent_date;
                    $property_plan['subscription_period'] = $property_plan_data->plan->subscription_type;
                    $property_plan['price'] = $property_plan_data->plan->price;
                }else{
                    $property_plan = [];
                }
            }else{
                $property_plan = [];
            }


            // property rent
            if (auth('sanctum')->user() != null) {
                $property_rent_data = PropertyRent::where('client_id',
                    auth('sanctum')->user()->id)->where('property_id',$prop->id)->first();
                if ($property_rent_data != null) {
                    $property_rent['id'] = $property_rent_data->id;
                    $property_rent['property_id'] = $property_rent_data->property_id ;
                    $property_rent['client_id'] = $property_rent_data->client_id;
                    $property_rent['amount'] = $property_rent_data->amount;
                    $property_rent['rent_date'] = date('y-m-d', strtotime($property_rent_data->rent_date));
                    $property_rent['next_rent_date'] = date('y-m-d', strtotime($property_rent_data->next_rent_date));
                    $property_rent['payment_status'] = $property_rent_data->payment_status;
                }else{
                    $property_rent = [];
                }
            }else{
                $property_rent = [];
            }






            $unit_type_attributes = UnitTypeAttribute::where('unit_type_id',$prop->unit_type_id)->get();
            $subscribes = CustomerSubscribe::where('property_id',$prop)->first();
            $name = 'name_'.\Lang::getLocale();
            $attributes = [];$gallery = [];$videos = [];$maps=[];
            $property_unit_type_attributes = ($prop->unit_type_attributes != null) ? (array)json_decode($prop->unit_type_attributes) : null;


            if ($unit_type_attributes != null){
                foreach ($unit_type_attributes as $attribute){
                    if ($property_unit_type_attributes != null) {
                        if (isset($property_unit_type_attributes[$attribute->name])) {
                            $attributes[] = [
                                'name' => transWord($attribute->name),
                                'value' => $property_unit_type_attributes[$attribute->name],
                                'icon' =>  $attribute->icon ? asset($attribute->icon) : null,
                                'type' =>  $attribute->type
                            ];
                        }
                    }
                }
            }

            $prop_gallery = PropertyGallery::where('property_id',$prop->id)->where('type','image')->get();
            foreach ($prop_gallery as $image) {
                $gallery[] = asset($image->attachment);
            }

            $prop_map = PropertyGallery::where('property_id',$prop->id)->where('type','map')->get();
            foreach ($prop_map as $image) {
                $maps[] = asset($image->attachment);
            }

            $prop_videos = PropertyGallery::where('property_id',$prop->id)->where('type','video')->get();
            foreach ($prop_videos as $video) {
                $videos[] = asset($video->video);
            }

            if (auth()->guard('sanctum')->user() != null) {
                $client = auth()->guard('sanctum')->user();
                $checkWish = Wishlist::where('client_id',$client->id)->where('property_id',$prop->id)->first();
                $isFav =  ($checkWish != null) ? 1 : 0;
            }else{
                $isFav = 0;
            }



            $data[] = [
                'id' => $prop->id,
                "unit_availability" => (UnitAvailability::where('id',$prop->unit_availability_id)->first() != null) ? $prop->unit_availability->unit_availability_name : '',
                "unit_availability_label" => (UnitAvailability::where('id',$prop->unit_availability_id)->first() != null) ? $prop->unit_availability->translate('en')->unit_availability_name : '',
                "unit_section_id" => (UnitSection::where('id',$prop->unit_section_id)->first() != null) ? $prop->unit_section->unit_section_name : '',
                "unit_section_label" => (UnitSection::where('id',$prop->unit_section_id)->first() != null) ? $prop->unit_section->translate('en')->unit_section_name : '',
                "unit_type_id" => (UnitType::where('id',$prop->unit_type_id)->first() != null) ? $prop->unit_type->unit_type_name : '',
                "unit_type_label" => (UnitType::where('id',$prop->unit_type_id)->first() != null) ? $prop->unit_type->translate('en')->unit_type_name : '',
                "country_id" => (Country::where('id',$prop->country_id)->first() != null) ? $prop->country->$name : '',
                "city_id" => (City::where('id',$prop->city_id)->first() != null) ? $prop->city->$name : '',
                "area_id" => (Area::where('id',$prop->area_id)->first() != null) ? $prop->area->$name : '',
                "address" => $prop->address,
                "google_location" => $prop->google_location,
                "building_no" => $prop->building_no,
                "building_block" => $prop->building_block,
                "building_qasema" => $prop->building_qasema,
                "paci_number" => $prop->paci_number,
                "space" => $prop->space,
                "amount" => $prop->amount,
                "guard_name" => $prop->guard_name,
                "guard_mobile" => $prop->guard_mobile,
                "title" => $prop->title,
                "unit_type_attributes" => $attributes,
                "unit_descriptions" => $prop->unit_descriptions,
                "terms" => $prop->terms,
                "first_company_commision" => $prop->first_company_commision,
                "second_company_commision" => $prop->second_company_commision,
                "first_source_commision" => $prop->first_source_commision,
                "second_source_commision" => $prop->second_source_commision,
                "company_commision_note" => $prop->company_commision_note,
                "instagram_link" => $prop->instagram_link,
                "website_link" => $prop->website_link,
                "land_lord_id" => ($prop->land_lord != null) ? $prop->land_lord->name : null,
                "user_id" => ($prop->user != null) ? $prop->user->name : null,
                "office_id" => ($prop->office != null) ? $prop->office->name : null,
                "status" => $prop->show_on_website,
                "gallery" => $gallery,
                "map" => [
                    'url' => $prop->google_location,
                    'images' => $maps
                ],
                "shareLink" => 'https://elite-homes.netlify.app' . '/'.app()->getLocale().'/properties/' . $prop->code. '?id=' . $prop->id,
                "created_at" => $prop->created_at->diffForHumans(),
                "views_count" => $prop->views_count ?$prop->views_count : null ,
                "feature_image" => $prop->feature_image ? asset($prop->feature_image) : null,
                "videos" =>  $videos,
                "rate" => "0.0",
                'isFav' => $isFav ,
                'created_by_type' =>  returnCreatedBy($prop),
                'created_by' => $prop->created_by ? $prop->created_by : null,
                'isAvailable' => $prop->status == 0 ? false : true,
                "property_rent" => $property_rent ? $property_rent: null,
                'property_plan' => $property_plan ? $property_plan : null,
                'rent_type' => $prop->rent_type ? $prop->rent_type : null,

            ];
        }
    }else{
        $prop = $properties;
        $subscribes = CustomerSubscribe::where('property_id',$prop)->first();
        $terms_page = Page::whereTranslationLike('title','%Terms and conditions%')->first();
        $unit_type_attributes = UnitTypeAttribute::where('unit_type_id',$prop->unit_type_id)->get();
        $name = 'name_'.\Lang::getLocale();
        $attributes = [];$gallery = [];$videos = [];$maps=[];
        $property_unit_type_attributes = ($prop->unit_type_attributes != null) ? (array)json_decode($prop->unit_type_attributes) : null;
        $isFav = 0;

        if (auth('sanctum')->user() != null) {
            $property_plan_data = PropertyPlan::where('user_id',auth('sanctum')->user()->id)->where('property_id',$prop->id)->first();
            if ($property_plan_data != null && $property_plan_data->plan != null) {
                $property_plan['id'] = $property_plan_data->plan->id;
                $property_plan['type'] = ($property_plan_data->plan->price > 0) ? 'paid' : 'free';
                $property_plan['name'] = $property_plan_data->plan->name;
                $property_plan['content'] = $property_plan_data->plan->content;
                $property_plan['subscription_period'] = $property_plan_data->plan->subscription_type;
                $property_plan['price'] = $property_plan_data->plan->price;
            }else{
                $property_plan = [];
            }
        }else{
            $property_plan = [];
        }


        // property rent
        if (auth('sanctum')->user() != null) {
            $property_rent_data = PropertyRent::where('client_id',
                auth('sanctum')->user()->id)->where('property_id',$prop->id)->first();
            if ($property_rent_data != null) {
                $property_rent['id'] = $property_rent_data->id;
                $property_rent['property_id'] = $property_rent_data->property_id ;
                $property_rent['client_id'] = $property_rent_data->client_id;
                $property_rent['amount'] = $property_rent_data->amount;
                $property_rent['rent_date'] = $property_rent_data->rent_date;
                $property_rent['next_rent_date'] = $property_rent_data->next_rent_date;
                $property_rent['payment_status'] = $property_rent_data->payment_status;
                $property_rent['rent_type'] = $prop->rent_type ? $prop->rent_type : null;
            }else{
                $property_rent = [];
            }
        }else{
            $property_rent = [];
        }

        if ($unit_type_attributes != null){
            foreach ($unit_type_attributes as $attribute){
                if ($property_unit_type_attributes != null) {
                    if (isset($property_unit_type_attributes[$attribute->name])) {
                        $attributes[] = [
                            'name' => transWord($attribute->name),
                            'value' => $property_unit_type_attributes[$attribute->name],
                            'icon' => asset($attribute->icon),
                            'type' =>  $attribute->type

                        ];
                    }
                }
            }
        }

        $prop_gallery = PropertyGallery::where('property_id',$prop->id)->where('type','image')->get();;
        foreach ($prop_gallery as $image) {
            $gallery[] = asset($image->attachment);
        }

        $prop_map = PropertyGallery::where('property_id',$prop->id)->where('type','map')->get();
        foreach ($prop_map as $image) {
            $maps[] = asset($image->attachment);
        }

        $prop_videos = PropertyVideo::where('property_id',$prop->id)->get();
        foreach ($prop_videos as $video) {
            $videos[] = asset($video->video);
        }

        if (auth()->guard('sanctum')->user() != null) {
            $client = auth()->guard('sanctum')->user();
            $checkWish = Wishlist::where('client_id',$client->id)->where('property_id',$prop->id)->first();
            $isFav =  ($checkWish != null) ? 1 : 0;
        }else{
            $isFav = 0;
        }




        $data = [
            'id' => $prop->id,
            "unit_availability" => (UnitAvailability::where('id',$prop->unit_availability_id)->first() != null) ? $prop->unit_availability->unit_availability_name : '',
            "unit_availability_label" => (UnitAvailability::where('id',$prop->unit_availability_id)->first() != null) ? $prop->unit_availability->translate('en')->unit_availability_name : '',
            "unit_section_id" => (UnitSection::where('id',$prop->unit_section_id)->first() != null) ? $prop->unit_section->unit_section_name : '',
            "unit_section_label" => (UnitSection::where('id',$prop->unit_section_id)->first() != null) ? $prop->unit_section->translate('en')->unit_section_name : '',
            "unit_type_id" => (UnitType::where('id',$prop->unit_type_id)->first() != null) ? $prop->unit_type->unit_type_name : '',
            "unit_type_label" => (UnitType::where('id',$prop->unit_type_id)->first() != null) ? $prop->unit_type->translate('en')->unit_type_name : '',
            "country_id" => (Country::where('id',$prop->country_id)->first() != null) ? $prop->country->$name : '',
            "city_id" => (City::where('id',$prop->city_id)->first() != null) ? $prop->city->$name : '',
            "area_id" => (Area::where('id',$prop->area_id)->first() != null) ? $prop->area->$name : '',
            "address" => $prop->address,
            "google_location" => $prop->google_location,
            "building_no" => $prop->building_no,
            "building_block" => $prop->building_block,
            "building_qasema" => $prop->building_qasema,
            "paci_number" => $prop->paci_number,
            "space" => $prop->space,
            "amount" => $prop->amount,
            "guard_name" => $prop->guard_name,
            "guard_mobile" => $prop->guard_mobile,
            "title" => $prop->title,
            "unit_type_attributes" => $attributes,
            "unit_descriptions" => $prop->unit_descriptions,
            "terms" => $prop->terms,
            "first_company_commision" => $prop->first_company_commision,
            "second_company_commision" => $prop->second_company_commision,
            "first_source_commision" => $prop->first_source_commision,
            "second_source_commision" => $prop->second_source_commision,
            "company_commision_note" => $prop->company_commision_note,
            "instagram_link" => $prop->instagram_link,
            "website_link" => $prop->website_link,
            "land_lord_id" => ($prop->land_lord != null) ? $prop->land_lord->name : null,
            "user_id" => $prop->user,
            "office_id" => $prop->office,
            "status" => $prop->show_on_website,
            "gallery" => $gallery,
            "map" => [
                'url' => $prop->google_location,
                'images' => $maps
            ],
            "shareLink" => 'https://elite-homes.netlify.app' . '/'.app()->getLocale().'/properties/' . $prop->code. '?id=' . $prop->id,
            "created_at" => $prop->created_at->diffForHumans(),
            "views_count" => $prop->views_count ?$prop->views_count : null ,
            "feature_image" => $prop->feature_image ? asset($prop->feature_image) : null,
            "videos" => $videos,
            "rate" => "0.0",
            'isFav' => $isFav,
            'created_by_type' => returnCreatedBy($prop),
            'created_by' => $prop->created_by ? $prop->created_by : null,
            'isAvailable' => $prop->status == "0" ? false : true,
            "property_rent" => $property_rent,
            'property_plan' => $property_plan ? $property_plan : null,

        ];
    }
    if ($gets != null) {
        $result = [];
        foreach ($data as $index => $d) {
            foreach ($d as $key => $get) {
                if (in_array($key,$gets)) {
                    $result[$key] = $get;
                }
                $data[$index] = $result;
            }
        }
    }

    return $data;
}

function getUnitSection($unit){
    return UnitSection::where('id',$unit)->first();
}

function getRequestProperties($properties){
    if ($properties != null) {
        return Property::whereIn('id',(array)json_decode($properties))->get();
    }else{
        return null;
    }
}

function calcEmployeeCommission($request_id)
{
    $first_commission = FinanceRequest::where('property_request_id',$request_id)->where('type','first_employee')->sum('amount');
    $second_commission = FinanceRequest::where('property_request_id',$request_id)->where('type','second_employee')->sum('amount');
    return transWord('First Commission').' : '.$first_commission.' '.transWord('Dinar').'<br>'.transWord('Second Commission').' : '.$second_commission.' '.transWord('Dinar');
}

function getProperty($property){
    if ($property != null) {
        return Property::where('id',$property)->first();
    }else{
        return null;
    }
}

function getNationality($nationality){
    return Nationality::where('id',$nationality)->first();
}

function getRequestPropertiesPopUp($requestData){
    if (getRequestProperties($requestData->properties) != null) {
        $client_name = transWord('Not Assigned');
        $sale_name = transWord('Not Assigned');
        if ($requestData->sale_id != null && $requestData->sales != null) {
            $sale_name = $requestData->sales->name;
        }
        if ($requestData->client_id != null && $requestData->client != null) {
            $client_name = $requestData->client->name;
        }
        if ($requestData->created_by_model != null && $requestData->created_by_id != null){
            $user = \DB::table($requestData->created_by_model)->where('id',$requestData->created_by_id)->first();
            $user_name = $user->name;
        }else{
            $user_name = transWord('Not Assigned');
        }
        return "<div class='tooltip-a'>".
                    "<div class='row'>".
                        "<div class='col-12'>".transWord('Client')." : ".$client_name."</div>".
                        "<div class='col-12'>".transWord('Sales Person')." : ".$sale_name."</div>".
                        "<div class='col-12'>".transWord('Created By')." : ".$user_name."</div>".
                        "<div class='col-12'>".transWord('Serious')." : ".$requestData->serious.'%'."</div>".
                        "<div class='col-12'>".transWord('Properties Count')." : ".count((array)json_decode($requestData->properties))."</div>".
                        "<div class='col-12'>".transWord('Created From')." : ".ucfirst($requestData->created_from)."</div>".
                    "</div>".
                "</div>";
    }else{
        return "";
    }
}

function vendorStatistics($vendor_id)
{
    $unit_groups = UnitGroup::where('vendor_id',$vendor_id)->count();
    $unit_groups_properties = UnitGroupProperty::where('vendor_id',$vendor_id)->count();
    $tenants = Tenants::where('vendor_id',$vendor_id)->count();
    $tenants_properties = TenantUnit::whereIn('unit_id',UnitGroupProperty::where('vendor_id',$vendor_id)->pluck('id'))->count();
    $properties_rents = TenantUnitRent::whereIn('unit_id',UnitGroupProperty::where('vendor_id',$vendor_id)->pluck('id'))->count();

    return [
        [transWord('Unit Groups'),$unit_groups,'<i class="fa fa-list"></i>',route('users')],
        [transWord('Units'),$unit_groups_properties,'<i class="fa fa-buildings"></i>',route('users')],
        [transWord('Tenants'),$tenants,'<i class="fa fa-users"></i>',route('users')],
        [transWord('Tenants Properties'),$tenants_properties,'<i class="fa fa-list"></i>',route('users')],
        [transWord('Tenants Properties Rent'),$properties_rents,'<i class="fa fa-money"></i>',route('users')],
    ];
}

function buildMenu()
{
    $data = [
        transWord('Home') => [
            transWord('Dashboard') => [
                'link' => route('dashboard'),
                'icon' => '<i class="menu-icon fa-solid fa-house"></i>',
                'permission' => '#',
                'active' => menuActive('dashboard',2)
            ]
        ],
        transWord('Auth') => [
            transWord('Roles') => [
                'link' => route('roles'),
                'icon' => '<i class="menu-icon fa-solid fa-lock"></i>',
                'permission' => '#',
                'active' => menuActive('roles',3)
            ],
            transWord('Users') => [
                'active' => menuToggle('users',2),
                'icon' => '<i class="menu-icon fa-solid fa-users"></i>',
                'active' => menuOpen('users',3),
                transWord('New User') => [
                    'link' => route('create_users'),
                    'permission' => 'create_users',
                    'active' => (menuActive('users',3) == 'active' && menuActive('create',4) == 'active') ? 'active' : ''
                ],
                transWord('Users') => [
                    'link' => route('users'),
                    'permission' => 'show_users',
                    'active' => (menuActive('users',3) == 'active' && menuActive('create',4) != 'active') ? 'active' : ''
                ]
            ]
        ],

        transWord('Others') => [
            transWord('Language Settings') => [
                'link' => route('language_settings'),
                'icon' => '<i class="menu-icon fa-solid fa-globe"></i>',
                'permission' => '#',
                'active' => menuActive('translates',3)
            ],
            transWord('Main Settings') => [
                'icon' => '<i class="menu-icon fa-solid fa-gear"></i>',
                'active' => ((menuOpen('main-settings',3) && menuOpen('view',4))  || (menuOpen('main-settings',3) && menuOpen('menu-builder',4)))? 'open' : '',
                transWord('Main Settings') => [
                    'link' => route('mainsettings'),
                    'permission' => '#',
                    'active' => (menuActive('main-settings',3) == 'active' && menuActive('view',4) == 'active') ? 'active' : ''
                ],
            ],
            transWord('Clear Cache') => [
                'link' => route('clear_cache'),
                'icon' => '<i class="menu-icon fa-solid fa-trash"></i>',
                'permission' => '#',
                'active' => menuActive('clear',3)
            ]
        ],
    ];
    return $data;
}

function broadCastNotification($title, $body , $topic, $route, $id = null)
    {
        $auth_key = "AAAAeu4fgyY:APA91bGvPXLcPcWr9Mpz_IRes57PEl82KZZHNOVEMzP_-xqvIIDenccsuKBljWyg5HTalzKEIpqODbnkIL9PaRQH4ZDsreI6WF3wd49guJvcwp7i3edxB9H3FwaGsLl6HVVqL7lmIH7-";
        $topic = "/topics/$topic";
        $data = [
            'title' => $title,
            'body' => $body,
            "route" => $route,
            "news_id" => $id,
            'icon' => 'https://drive.google.com/file/d/1drCcxdGyNLpggoDtRWWJP3HrhaRJDlQW/view',
            'banner' => '1',
            'sound' => 'shutter.wav',
            "priority" => "high"
        ];

        $notification = [
            'title' => $title,
            'body' => $body,
            'sound' => 'shutter.wav',
            'icon' => 'https://drive.google.com/file/d/1drCcxdGyNLpggoDtRWWJP3HrhaRJDlQW/view',
            'banner' => '1',
            "priority" => "high",
            'data' => $data
        ];

        $fields = json_encode([
            'to' => $topic,
            'notification' => $notification,
            'data' => $data
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: key=' . $auth_key, 'Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
    # -------------------------------------------------
    function pushNotification($notification)
    {
        $auth_key = "AAAAeu4fgyY:APA91bGvPXLcPcWr9Mpz_IRes57PEl82KZZHNOVEMzP_-xqvIIDenccsuKBljWyg5HTalzKEIpqODbnkIL9PaRQH4ZDsreI6WF3wd49guJvcwp7i3edxB9H3FwaGsLl6HVVqL7lmIH7-";
        $device_token = $notification['device_token'];


        // $ddd = json_decode($device_token);
        // return json_encode($ddd);
        $data = [
            'body' => $notification['body'],
            // 'type' => $notification['type'],
            'title' => $notification['title'],
            'id' => $notification['id'],
            'badge' => $notification['badge'],
            'click_action' => $notification['click_action'],
            'icon' => 'https://drive.google.com/file/d/1drCcxdGyNLpggoDtRWWJP3HrhaRJDlQW/view',
            'banner' => '1',
            'sound' => 'shutter.wav',
            "priority" => "high"
        ];
        $notification = [
            'body' => $notification['body'],
            // 'type' => $notification['type'],
            'title' => $notification['title'],
            'id' => $notification['id'],
            'badge' => $notification['badge'],
            'click_action' => $notification['click_action'],
            'data' => $data,
            'icon' => 'https://drive.google.com/file/d/1drCcxdGyNLpggoDtRWWJP3HrhaRJDlQW/view',
            'banner' => '1',
            'sound' => 'shutter.wav',
            "priority" => "high"
        ];

        $fields = json_encode([
            'registration_ids' => $device_token,
            'notification' => $notification,
            'data' => $data,
        ]);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: key=' . $auth_key, 'Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }
