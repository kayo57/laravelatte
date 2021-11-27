<!-------------ログインloginページ-----3------>
@extends('layouts.base')<!--default-->
<style>
  th {
    background-color: #289ADC;
    color: white;
    padding: 5px 40px;
  }

  tr:nth-child(odd) td {
    background-color: #FFFFFF;
  }

  td {
    padding: 25px 40px;
    background-color: #EEEEEE;
    text-align: center;
  }
</style>
<!--@section('title', 'base.blade.php')-->

@section('login')
<p>{{$text}}</p>
<form action="/login" method="get">
  <table>
    @csrf
    <tr>
      <th>メール: </th>
      <td><input type="text" name="email"></td>
    </tr>
    <tr>
      <th>パスワード: </th>
      <td><input type="password" name="password"></td>
    </tr>
    <tr>
      <th></th>
      <td><input type="submit" value="送信"></td>
    </tr>
  </table>
</form>
@endsection