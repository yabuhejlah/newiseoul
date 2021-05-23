<?php

namespace App\Http\Controllers;

use App\Lang;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Chat;

class ChatController extends Controller
{

    public function getChatMessagesNewCount(Request $request)
    {
        if (!Auth::check())
            return response()->json(['error' => "1",], 200);

        $id = Auth::id();
        return response()->json([
            'error' => "0",
            'count' => count(DB::table('chat')->where('user', "$id")->where('read', "false")->get()),
            //'orders' => count(DB::select("SELECT * FROM orders WHERE vendor=$id AND view='false'")),
        ], 200);
    }

    public function load(Request $request)
    {
        if (!Auth::check())
            return \Redirect::route('/');
        return view('chat');
    }

//    public function chatUsersApi(Request $request){
//        $id = Auth::user()->id;
//        // get vendor users, all messages from vendor and unread messages
//        // and last message from vendor (if exist)
//        $users = DB::select("SELECT * FROM (SELECT users.id, users.name, users.role,
//            CASE
//             WHEN image_uploads.filename IS NULL THEN \"noimage.png\"
//             ELSE image_uploads.filename
//            END AS image,
//            count(chat.read='false' OR chat.read='true') as count,
//            (SELECT count(chat.id) FROM chat WHERE chat.read='false' AND chat.from_user=users.id AND chat.to_user=$id) as unread,
//            (SELECT chat.text FROM chat WHERE chat.from_user=users.id AND chat.to_user=$id ORDER BY chat.updated_at DESC LIMIT 1) as text
//            FROM users
//            LEFT JOIN image_uploads ON image_uploads.id=users.imageid
//            LEFT JOIN chat ON chat.from_user=users.id AND chat.to_user=$id
//            GROUP BY users.id, users.name, image_uploads.filename, users.role
//            ORDER BY unread DESC) AS i WHERE (count <> 0 OR role=2) AND id != $id");
//        //
//        $path = Settings::getPath();
//        if ($path == null)
//            return "Set URL_DASHBOARD variable in .env file";
//        foreach ($users as &$user)
//            $user->image = $path . $user->image;
//
//        return response()->json([
//            'error' => '0',
//            'users' => $users,
//        ]);
//    } // role=2 OR role=1

    public function chatMessages2(Request $request)
    {
        return ChatController::getMessages();
    }

    public function getMessages(){
        $id = Auth::user()->id;
        $msg = DB::table('chat')->where('user', '=', "$id")->orderBy('created_at', 'asc')->get();
        DB::table('chat')->where('user', '=', "$id")->update(array('read' => 'true', 'updated_at' => new \DateTime()));
        return response()->json([
            'error' => "0",
            'messages' => $msg
        ], 200);
    }

    public function chatMessageSend2(Request $request){
        $id = Auth::user()->id;
        $text = $request->input('text');

        if (!Auth::check())
            return response()->json(['error' => "1",], 200);

        $values = array(
            'user' => $id,
            'text' => "$text",
            'author' => "customer",
            'delivered' => "false", 'read' => "false",
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        );
        DB::table('chat')->insert($values);

        //
        // Send Notifications to Admin and Managers
        //
        $managers = DB::table('users')->where('role',"<", "3")->get();
        foreach ($managers as &$value) {
            $myRequest = new Request();
            $myRequest->setMethod('POST');
            $myRequest->request->add(['chat' => 'true']);
            $myRequest->request->add(['user' => $value->id]);
            $myRequest->request->add(['title' => Lang::get(151)]); // Chat Message
            $myRequest->request->add(['text' => $text]);
            $defaultImage = DB::table('settings')->where('param', '=', "notify_image")->get()->first()->value;
            $myRequest->request->add(['imageid' => $defaultImage]);
            MessagingController::sendNotify($myRequest);
        }
        return ChatController::getMessages();
    }
}
