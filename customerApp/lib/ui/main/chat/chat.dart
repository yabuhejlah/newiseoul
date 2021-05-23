import 'dart:async';
import 'dart:convert';
import 'dart:io';

import 'package:flutter/material.dart';
import 'package:fooddelivery/config/api.dart';
import 'package:fooddelivery/main.dart';
import 'package:fooddelivery/model/server/chatGet.dart';
import 'package:fooddelivery/model/server/chatSend.dart';
import 'package:fooddelivery/widget/ICard31FileCaching.dart';
import 'package:fooddelivery/widget/InputFieldArea3.dart';
import 'package:fooddelivery/widget/colorloader2.dart';
import 'package:fooddelivery/widget/easyDialog2.dart';
import 'package:fooddelivery/widget/ibackground4.dart';
import 'package:fooddelivery/widget/ibutton3.dart';
import 'package:fooddelivery/widget/widgets.dart';
import 'package:intl/intl.dart';
import 'package:http/http.dart' as http;

class ChatScreen extends StatefulWidget {
  final Function(String) onBack;
  ChatScreen({Key key, this.onBack}) : super(key: key);

  @override
  _ChatScreenState createState() => _ChatScreenState();
}


class _ChatScreenState extends State<ChatScreen> {
  StreamController _streamController = StreamController();
  Timer _timer;
  bool nonext = false;
  onSendText(){
    if (editController.text.isEmpty || nonext)
      return;
    final DateFormat formatter = DateFormat('yyyy-MM-dd HH:mm:ss');
    var createdAt = formatter.format(DateTime.now());
    _this.add(ChatMessages(id: -1, text: editController.text,
        author: "customer", delivered: "false", read: "false", date: createdAt
    ));
    setState(() {
    });
    var text = editController.text;
    editController.text = "";
    Future.delayed(const Duration(milliseconds: 500), () {
      _scrollController.jumpTo(_scrollController.position.maxScrollExtent,);
    });
    print("Send text ${editController.text}");
    nonext = true;
    chatSend(account.token, text, _success, _error);
  }

  _pressLoginButton(){
    print("User pressed \"LOGIN\" button");
    route.push(context, "/login");
  }

  _pressDontHaveAccountButton(){
    print("User press \"Don't have account\" button");
    route.push(context, "/createaccount");
  }

  //
  ///////////////////////////////////////////////////////////////////////////////
  double windowWidth = 0.0;
  double windowHeight = 0.0;
  bool _wait = false;
  List<ChatMessages> _this = [];
  List<ChatMessages> messages;
  String error;
  int unread;
  Future getData(context) async {
    try {
      var url = "${serverPath}getChatMessages";
      var response = await http.get(url, headers: {
        'Content-type': 'application/json',
        'Accept': "application/json",
        'Authorization': 'Bearer ${account.token}',
      }).timeout(const Duration(seconds: 10));
      if (response.statusCode == 200) {
        var jsonResult = json.decode(response.body);
        if (jsonResult['error'] == '0') {
          ResponseChatMessages ret = ResponseChatMessages.fromJson(jsonResult);
          print(ret.messages[0].author);
          _streamController.add(ret.messages);
        }else
          print("error=${jsonResult['error']}");
      } else
        print("statusCode=${response.statusCode}");
    } catch (ex) {
      print(ex.toString());
    }
    //Add your data to stream

  }
  @override
  void initState() {
    if (account.isAuth())
      //chatGet(account.token, _success, _error);
      getData(context);
    _timer = Timer.periodic(Duration(seconds: 5), (timer) => getData(context));
    account.addCallback(this.hashCode.toString(), callback);
    account.addChatCallback(callbackReload);
    super.initState();
  }

  callbackReload(){
    chatGet(account.token, _success, _error);
  }

  _error(String error){
    _waits(false);
    openDialog("${strings.get(128)} $error"); // "Something went wrong. ",
  }

  _waits(bool value){
    if (mounted)
      setState(() {
        _wait = value;
      });
    _wait = value;
  }

  _success(List<ChatMessages> _data) {
    _waits(false);
    nonext = false;
    _this = _data;
    account.chatCount = 0;
    account.redraw();
    setState(() {});
    Future.delayed(const Duration(milliseconds: 500), () {
      _scrollController.jumpTo(_scrollController.position.maxScrollExtent,);
    });
  }

  callback(bool reg){
    setState(() {
    });
  }

  @override
  void dispose() {
    account.addChatCallback(null);
    route.disposeLast();
    account.removeCallback(this.hashCode.toString());
    account.redraw();
    if (_timer.isActive) _timer.cancel();
    super.dispose();
  }

  final editController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    windowWidth = MediaQuery.of(context).size.width;
    windowHeight = MediaQuery.of(context).size.height;

    var colorsGradient = [Colors.transparent, Colors.transparent];

    return Scaffold(
        backgroundColor: theme.colorBackground,
        body:
        Directionality(
        textDirection: strings.direction,
        child:
        Stack(
          children: <Widget>[

        if (account.isAuth())
            IBackground4(width: windowWidth, colorsGradient: colorsGradient),

        if (account.isAuth())
            Align(
              alignment: Alignment.bottomCenter,
              child: Container(
                padding: EdgeInsets.only(left: 10, right: 10),
                width: windowWidth,
                height: 50,
                color: theme.colorBackgroundDialog,
                child: InputFieldArea3(hint: "Message", callback: onSendText,
                controller : editController, type : TextInputType.text, colorDefaultText: theme.colorDefaultText),
              ),
            ),

        if (account.isAuth())(
            Container(
              margin: EdgeInsets.only(left: 10, right: 10, top: MediaQuery.of(context).padding.top, bottom: 50),
              child: _body(),
            ))else (
              _mustAuth()
              ),

            Container(
              color: theme.colorBackground.withAlpha(150),
              child: headerWidget(context, widget.onBack, Colors.black.withAlpha(150), ""),
            ),

            if (_wait)
              Center(
                  child: ColorLoader2(
                    color1: theme.colorPrimary,
                    color2: theme.colorCompanion,
                    color3: theme.colorPrimary,
                  ),
                ),

            IEasyDialog2(setPosition: (double value){_show = value;}, getPosition: () {return _show;}, color: theme.colorGrey,
                body: _dialogBody, backgroundColor: theme.colorBackground),

          ],
        )
    ));
  }

  ScrollController _scrollController = new ScrollController();

  _body(){
    return Container(
      alignment: Alignment.bottomCenter,
      child: StreamBuilder(
        stream: _streamController.stream,
          builder: (BuildContext context, AsyncSnapshot snapshot) {
            if (snapshot.hasData)
              return ListView(
                shrinkWrap: true,
                controller: _scrollController,
                children: snapshot.data.map<Widget>((document) {
                    return ICard31FileCaching(
                        key: UniqueKey(),
                        id: document.id,
                        colorLeft: theme.colorBackgroundDialog,
                        colorRight: Color(0xfffffff),
                        text: document.text,
                        textStyle: theme.text14bold,
                        balloonColor: theme.colorPrimary,
                        date: document.date.substring(11,16),
                        dateStyle: theme.text12bold,
                        positionLeft: (document.author == "manager"),
                        delivered: (document.delivered == "true"),
                        read: (document.read == "true")
                    );
                      // Column(
                      //   children: [
                      //     Container(child: Text('${document.author}')),
                      //   ],
                      // );
            }).toList(),
              );
            return Text('Loading...');
          }),
    );
  }

  _body2(){
    var list = List<Widget>();
    var last = "";

    for (var _data in _this) {
      var now = _data.date.substring(0, 11);
      if (now != last) {
        list.add(SizedBox(height: 10,));
        list.add(Text(
            now, style: theme.text14boldWhite, textAlign: TextAlign.center),);
        list.add(SizedBox(height: 10,));
        last = now;
      }
      list.add(
          ICard31FileCaching(
              key: UniqueKey(),
              id: _data.id,
              colorLeft: theme.colorBackgroundDialog,
              colorRight: Color(0xFFcbecff),
              text: _data.text,
              textStyle: theme.text14bold,
              balloonColor: theme.colorPrimary,
              date: _data.date.substring(11,16),
              dateStyle: theme.text12bold,
              positionLeft: (_data.author == "manager"),
              delivered: (_data.delivered == "true"),
              read: (_data.read == "true")
          )
      );
    }
    list.add(SizedBox(height: 10,));
    return list;
  }

  _mustAuth(){
    return Center(
      child: Container(
          child: Column(
            mainAxisSize: MainAxisSize.min,
            children: [
              UnconstrainedBox(
                  child: Container(
                      width: windowWidth/3,
                      child: Image.asset("assets/auth.png",
                        fit: BoxFit.contain, color: Colors.black.withAlpha(80),
                      )
                  )
              ),
              SizedBox(height: 30,),
              Text(strings.get(125)), // "You must sign-in to access to this section",
              SizedBox(height: 40,),
              Container(
                margin: EdgeInsets.only(left: windowWidth*0.1, right: windowWidth*0.1),
                child: IButton3(pressButton: _pressLoginButton, text: strings.get(22), // LOGIN
                  color: theme.colorPrimary,
                  textStyle: theme.text16boldWhite,),
              ),
              Container(
                padding: EdgeInsets.only(left: 20, right: 20, bottom: 10, top: 20),
                child: InkWell(
                    onTap: () {
                      _pressDontHaveAccountButton();
                    }, // needed
                    child:Text(strings.get(19),                    // ""Don't have an account? Create",",
                        overflow: TextOverflow.clip,
                        textAlign: TextAlign.center,
                        style: theme.text14primary
                    )),
              )
            ],
          )
      ),
    );
  }

  double _show = 0;
  Widget _dialogBody = Container();

  openDialog(String _text) {
    _dialogBody = Column(
      children: [
        Text(_text, style: theme.text14,),
        SizedBox(height: 40,),
        IButton3(
            color: theme.colorPrimary,
            text: strings.get(155),              // Cancel
            textStyle: theme.text14boldWhite,
            pressButton: (){
              setState(() {
                _show = 0;
              });
            }
        ),
      ],
    );

    setState(() {
      _show = 1;
    });
  }

}

