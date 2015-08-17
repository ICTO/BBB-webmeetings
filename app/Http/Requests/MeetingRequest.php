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
        return [
            'title' => 'required',
            'description' => 'required',
            'welcomeText' => 'required',
            'moderatorAccessCode' => 'required|numeric|maxint:5|min:0',
            'attendeeAccessCode' => 'required|numeric|maxint:5|min:0'
        ];
    }

    public function forbiddenResponse()
    {
        abort(403);
    }
}
