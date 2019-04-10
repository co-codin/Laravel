@extends('emails.layouts.default')

@section('content')
    <p>Thanks for downloading <strong>{{ $sale->file->title }}</strong> from Filemarket.</p>

    <p><a href="">Download your file</a></p>

    <p>
        Or, copy and paste this into your browser:<br>
    </p>
@endsection
