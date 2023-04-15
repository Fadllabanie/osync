<?php

namespace App\Http\Services;

use App\Models\Card;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;

class ClientService
{
    /**
     * Create new row.
     * @param  array $data 
     * @return mixed
     */
    public static function updateOrCreate($data)
    {
        DB::beginTransaction();

        $response['success'] = true;

        try {
            switch ($data['profile_type']) {
                case 'adult':
                    $data = ClientService::adultUpdate($data);
                    break;
                case 'child':
                    $data = ClientService::childUpdate($data);
                    break;
                case 'animal':
                    $data = ClientService::animalUpdate($data);

                    break;
                default;
                    abort(404);
                    break;
            }

            DB::commit();

            return $response;
        } catch (\Exception $exception) {
            //DB::rollback();
            $response['success'] = false;
            $response['message'] = $exception->getMessage();
            dd($response);
        }
    }
    /**
     * @param  array $data 
     * @return mixed
     */
    public static function adultUpdate($data)
    {

        $profile = Profile::create(
            [
                'user_id' => 1,
                'type' => 'adult',
                'category_id' => $data['category_id'],
                'card_id' => $data['card_id'],
                'code' => generateRandomCode('chd'),
                'prefix' => $data['prefix'],
                'first_name' => $data['first_name'],
                'nike_name' => $data['nike_name'],
                'last_name' => $data['last_name'],
                'middle_name' => $data['middle_name'],
                'work_mobile' => $data['work_mobile'],
                'work_phone' => $data['work_phone'],
                'fax' => $data['fax'],
                'work_email' => $data['work_email'],
                'role' => $data['role'],
                'organization_address' => $data['organization_address'],
                'organization_url' => $data['organization_url'],
                'organization' => $data['organization'],
                'avatar' => upload($data['avatar'], 'avatars'),
                'mobile' => $data['mobile'],
                'email' => $data['email'],
                'gender' => $data['gender'],
                'birthday' => $data['birthday'],
                'status' => true,
            ]
        );
        return $profile;
    }


    /**
     * @param  array $data 
     * @return mixed
     */
    public static function childUpdate($data)
    {
        $child = Profile::create([
            'user_id' => 1,
            'type' => 'child',
            'category_id' => $data['category_id'],
            'card_id' => $data['card_id'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],  # family - dog - cat - etc 
            'nike_name' => $data['nike_name'],
            'code' => generateRandomCode('chd'),
            'home_phone' => $data['home_phone'],
            'mobile' => $data['mobile'],
            'birthday' => $data['birthday'],
            'gender' => $data['gender'],
            'blood_type' => $data['blood_type'],
            'avatar' => upload($data['avatar'], 'children'),
            'home_address' => $data['home_address'],
            'school_address' => $data['school_address'],
            'status' => true,
        ]);

        Card::where('id', $data['card_id'])->update('client_id', 1);

        return $child;
    }
    /**
     * @param  array $data 
     * @return mixed
     */
    public static function animalUpdate($data)
    {
        // dd($data);
        // $user = Animal::updateOrCreate([
        //     'user_id' => $data['user_id'],
        // ], [
        $user = Profile::create([
            'user_id' => 1,
            'type' => 'animal',
            'category_id' => $data['category_id'],
            'card_id' => $data['card_id'],

            'first_name' => $data['name'],
            'anima_type' => $data['anima_type'],  # family - dog - cat - etc 
            'home_phone' => $data['home_phone'],
            'owner_mobile' => $data['mobile'],
            'avatar' => upload($data['avatar'], 'animals'),
            'code' => generateRandomCode('anm'),
            'gender' => $data['gender'],
            'status' => true,
        ]);

        return $user;
    }
}
