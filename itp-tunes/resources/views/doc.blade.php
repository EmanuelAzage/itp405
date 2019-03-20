@extends('layout')

@section('title', 'Doc')

@section('main')

<div style="background-color:silver" id="doc" contentEditable="true"></div>

<script>
  let connection = new WebSocket('wss://eazage-websocket-server.herokuapp.com') || new WebSocket('ws://localhost:8080');

  connection.onopen = () => {
    console.log('connected from the frontend');
  };

  connection.onerror = () => {
    console.log('failed to connect from the frontend');
  };

  connection.onmessage = (event) => {
    console.log(`recieved message: ${event.data}`);
    let div = document.getElementById('doc');
    div.innerHTML = event.data;
    // div.selectionStart = div.selectionEnd = div.innerHTML.length;
    console.log(div.childNodes);
  };

  document.getElementById('doc').addEventListener('input', (event) => {
    event.preventDefault();
    let message = document.getElementById('doc').innerHTML;
    message = message.replace("<div><br></div>", "<br>");
    console.log("client sending:", message);
    connection.send(message);
  });

</script>

@endsection
