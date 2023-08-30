<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Admin/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Band $band)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function sendMailToAllClients(Request $request) {
        // dd($request);
        $emails = Band::pluck('email');

        if($request->message != null && $request->subject != null) {
            $subject = $request->subject;
            $content = $request->message;

            foreach($emails as $e) {

                Mail::send('email.bulk-mail', ['content' => $content], function($message) use ($subject, $e) {
                    $message->to($e);
                    $message->subject($subject);
                });
            }
        } else {
            return back()->with('error', 'Fields cannot be empty!');
        }



        return back()->with('info', 'Mails has been sent to clients!');
    }
}
