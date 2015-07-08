<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Meeting;
use Auth;

class MeetingRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Request::route()->getMethods()[0] == 'PATCH') {
            $meeting = Request::route()->getParameter('meeting');

            if($meeting->user->id !== Auth::id()) {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(Request::route()->getMethods()[0] == 'PATCH') {
            return [
                'title' => 'required',
                'description' => 'required',
                'welcomeText' => 'required'
            ];
        } else {
            return [
                'title' => 'required',
                'description' => 'required',
                'welcomeText' => 'required',
                'moderatorPassword' => 'required',
                'attendeePassword' => 'required'
            ];
        }
    }

    public function forbiddenResponse()
    {
        abort(403);
    }
}
