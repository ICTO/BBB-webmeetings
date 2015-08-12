<?php namespace App\Http\Controllers;

use Auth;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\MeetingRequest;
use App\Http\Controllers\Controller;
use App\Meeting;
use Illuminate\Support\Facades\Redirect;
use Uuid;
use Bigbluebutton;

/**
 * Class MeetingsController
 * @package App\Http\Controllers
 */
class MeetingController extends Controller
{
    /**
     * Show all meetings
     *
     * @return response
     */
    public function index()
    {
        return view('meetings.index');
    }

    /**
     * Api response that returns all meetings
     *
     * @return mixed
     */
    public function apiIndex()
    {
        $meetings = Meeting::latest()->with(['user' => function ($query){
            $query->select('id', 'full_name');
        }])->select('id', 'user_id', 'title', 'description', 'created_at', 'updated_at')->get();
        return $meetings;
    }

    /**
     * Show a listing of your own meetings
     *
     * @return array|\Illuminate\View\View|mixed
     */
    public function indexOwnMeetings()
    {
        $meetings = Meeting::latest()->fromUser()->get();

        return view('meetings.mymeetings', compact('meetings'));
    }

    /**
     * Show a meeting with a specific id
     *
     * @param  Meeting $meeting
     * @return response
     */
    public function show(Meeting $meeting)
    {
        return view('meetings.show', compact('meeting'));
    }

    /**
     * Create a new meeting
     *
     * @return response
     */
    public function create()
    {
        return view('meetings.create');
    }

    /**
     * Edit an existing meeting
     *
     * @param Meeting $meeting
     * @return array|\Illuminate\View\View|mixed
     */
    public function edit(Meeting $meeting)
    {
        return view('meetings.edit', compact('meeting'));
    }

    /**
     * Delete a single meeting ( GET )
     *
     * @param Meeting $meeting
     * @return mixed
     */
    public function delete(Meeting $meeting)
    {
        $this->destroy($meeting);
        return Redirect::to('mymeetings');
    }

    /**
     * Deletes a single meeting ( HTTP DELETE )
     *
     * @param Meeting $meeting
     * @throws \Exception
     */
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
    }

    /**
     * Store a new meeting
     *
     * @param  MeetingRequest $request
     * @return request
     */
    public function store(MeetingRequest $request)
    {
        $meeting = new Meeting;
        $meeting->meetingId = Uuid::generate();
        $meeting->user_id = Auth::id();
        $meeting->title = $request->title;
        $meeting->description = $request->description;
        $meeting->welcomeText = $request->welcomeText;
        $meeting->moderatorPassword = $request->moderatorPassword;
        $meeting->attendeePassword = $request->attendeePassword;

        $meeting->save();

        flash()->success(trans('meetings.createdFlashMessage'));
        return redirect('/');
    }

    /**
     * Update the existing meeting
     *
     * @param Meeting $meeting
     * @param CreateMeeting|MeetingRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function update(Meeting $meeting, MeetingRequest $request)
    {
        $meeting->update($request->all());

        flash()->success(trans('meetings.updatedFlashMessage'));
        return redirect('/');
    }

    /**
     * Request the bigbluebutton join meeting url and redirect to user to this url
     *
     * @param Meeting $meeting
     * @param Request $request
     * @return mixed
     */
    public function join(Meeting $meeting, Request $request)
    {
        // Check if password provided equals the moderator or attendee password
        if($meeting->moderatorPassword !== $request->get('password') && $meeting->attendeePassword !== $request->get('password')) {
            flash()->error(trans('meetings.wrongMeetingCredentials'));
            return redirect('/meeting/' . $meeting->id);
        }

        if (Bigbluebutton::isMeetingRunning($meeting->meetingId)) {
            // Get join url
            $joinUrl = Bigbluebutton::getJoinMeetingURL($meeting->meetingId, $request->get('username'), $request->get('password'));
        } else {
            // create meeting and get join url
            $meetingParams = [
                'moderatorPW' => $meeting->moderatorPassword,
                'attendeePW' => $meeting->attendeePassword,
                'welcome' => $meeting->welcomeText,
                'name' => $meeting->title,
                'logoutURL' => url('/')
            ];
            Bigbluebutton::createMeeting($meeting->meetingId, $meetingParams);
            $joinUrl = Bigbluebutton::getJoinMeetingURL($meeting->meetingId, $request->get('username'), $request->get('password'));
        }

        return Redirect::to($joinUrl);
    }
}
