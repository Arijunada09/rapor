@extends('layouts.master')
@section('content')
<h3>Dashboard</h3>
{{ auth()->user()->name }}
@endsection