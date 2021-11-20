<!---resources/views/common/errosrs.blade.php---->
@extends('Layouts.app')

@if(count($errors) > 0)
<div class="alert alert-danger">
  @foreach($errors->all() as $error)
  <p>{{ $error }}</p>
  <div>

    <ul>@foreach ($errors->all() as $errors)
      <li>{{$errors}}</li>
      @endforeach
    </ul>
  </div>
</div>
@endif