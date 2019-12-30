@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Questionnaire</div>

                    <div class="card-body">


                        <form action="/questionnaires" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" type="title" class="form-control" id="title"
                                       aria-describedby="titleHelp" placeholder="Title">
                                <small id="titleHelp" class="form-text text-muted">Give your questionnaire
                                    title.</small>

                                @error('title')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="purpose">Purpose</label>
                                <input name="purpose" type="purpose" class="form-control" id="title"
                                       aria-describedby="purposeHelp" placeholder="Purpose">
                                <small id="purposeHelp" class="form-text text-muted">Giving a purpose will increase
                                    responses.</small>

                                @error('purpose')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Create Questionnaire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
