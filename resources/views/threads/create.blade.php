@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Thread</div>
                <div class="panel-body">
                    <form method="post" action="/threads">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="body">Body:</label>
                            <textarea name="body" class="form-control" rows="8"></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
