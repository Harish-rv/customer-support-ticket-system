<?php

namespace App\Http\Controllers;

use App\Models\responses;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Response;

class TicketsController extends Controller
{
    public function tickets (){
        if(!Auth::check()){
            return redirect()->route('user.login');
        }

        if(auth()->user()->role!='staff'){
            $userId = auth()->user()->id;
            $user = User::find($userId);
            $tickets = $user->tickets;
        }else{
            $tickets = Tickets::with('user')->get();
        }
        // return Response::json($tickets);
        return view('users/tickets/list',compact('tickets'));
        // echo ;
    }

    public function ticket_add (){
        if(!Auth::check()){
            return redirect()->route('user.login');
        }
        return view('users/tickets/add');
    }

    public function ticket_addProcess(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $postData = $request->all();

        $ticktes = new Tickets();
        $ticktes->title = $postData['title'];
        $ticktes->description = $postData['description'];
        $ticktes->user_id = $postData['user_id'];
        $ticktes->status = 1;

        $ticktes->save();
        
        return redirect()
        ->route('tickets')
        ->withMessage('Ticket Created Successfully');
    }

    public function ticket_respond($userid,$ticket_id){
        return view('users/tickets/respond')->with(compact('userid','ticket_id'));
    }

    public function ticket_respondprocess(Request $request){
        $request->validate([
            'description' => 'required',
            'status' => 'required'
        ]);

        $postData = $request->all();
        $respond = new responses();
        
        $respond->staff_id = $postData['staff_id'];
        $respond->user_id = $postData['user_id'];
        $respond->description = $postData['description'];
        $respond->status = $postData['status'];

        $respond->save();

        // $ticket = new Tickets();
        Tickets::where('id', $postData['ticket_id'])->update(['status' => $postData['status']]);

        return redirect()
        ->route('tickets')
        ->withMessage('Successfully Updated');
    }
}
