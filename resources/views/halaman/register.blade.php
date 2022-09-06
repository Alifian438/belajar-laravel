@extends('layout.master')

@section('judul')
Buat Account Baru!
@endsection

@section('content')
<h3>Sign Up Form</h3>
    <form action="/welcome" method="POST">
        @csrf
        <label for="">First name:</label><br><br>
        <input type="text" name="first name"><br><br>
        <label for="">Last name:</label><br><br>
        <input type="text" name="last name"><br><br>
        <label for="">Gender:</label><br><br>
        <input type="radio" name="gender" value="1">Male <br>
        <input type="radio" name="gender" value="2">Female <br> 
        <input type="radio" name="gender" value="3">Other <br> <br>
        <label for="">Nationality:</label><br><br>
        <select name="nationality" id="">
            <option value="indonesia">Indonesia</option>
            <option value="malaysia">Malaysia</option>
            <option value="singapura">Singapura</option>
            <option value="australia">Australia</option>
        </select><br><br>
        <label for="">Language Spoken:</label><br><br>
        <input type="checkbox" name="language" value="bahasa indonesia">Bahasa Indonesia <br>
        <input type="checkbox" name="language" value="english">English <br>
        <input type="checkbox" name="language" value="other">Other <br><br>
        <label for="">Bio:</label><br><br>
        <textarea name="bio" id="" cols="30" rows="10"></textarea><br>
        <input type="submit" value="Submit">
        <br><br><br><br><br>

@endsection
    
    