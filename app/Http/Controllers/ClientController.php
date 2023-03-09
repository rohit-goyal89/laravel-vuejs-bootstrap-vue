<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Client as ClientResource;

class ClientController extends Controller
{
    /**
     * List of posts.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if(!empty($request->search)) {
            $sea = $request->search;
            return  ClientResource::collection(Client::where(function ($query) use($sea) {
                $query->where('company_name', 'Like', '%' . $sea . '%')->orWhere('phone', 'like', '%' . $sea . '%')
                      ->orWhere('primary_name', 'like','%' . $sea . '%')->orWhere('primary_email', 'like', '%' . $sea . '%');
            })->get());
        } else {
            return  ClientResource::collection(Client::all());
        }
        
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'company_name' => 'required|unique:clients|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|regex:/^[0-9]{10}+$/',
            'primary_email' => 'email',
            'primary_phone' => 'regex:/^[0-9]{10}+$/',
            'secondary_email' => 'email',
            'secondary_phone' => 'regex:/^[0-9]{10}+$/',
            'other_email' => 'email',
            'other_phone' => 'regex:/^[0-9]{10}+$/'
        ];
       // dd($request->user_id);
        $validator = Validator::make($request->all(), $rules,  [
            'company_name.required' => 'You must enter company name correctly.',
            'company_name.min' => 'You must use the company name correctly.',
            'address.required' => 'You must enter address correctly.',
            'address.min' => 'You must use the address correctly.',
            'phone.required' => 'You must enter phone no correctly.',
            'phone.regex' => 'Phone no is not valid.'
        ]);
        if ($validator->fails()) {
            return response()->json([
                "message"=> "The given data was invalid.",
                "errors" => $validator->getMessageBag()->getMessages()
            ], 422);
        }
        $client = Client::create([
            'user_id' => $request->user_id,
            'company_name' => $request->company_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'primary_name' => $request->primary_name,
            'primary_email' => $request->primary_email,
            'primary_phone' => $request->primary_phone,
            'secondary_name' => $request->secondary_name,
            'secondary_email' => $request->secondary_email,
            'secondary_phone' => $request->secondary_phone,
            'other_name' => $request->other_name,
            'other_email' => $request->other_email,
            'other_phone' => $request->other_phone
        ]);

        return new ClientResource($client);
    }

    
}
