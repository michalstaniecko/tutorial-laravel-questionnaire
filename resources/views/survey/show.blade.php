@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ $questionnaire->title }}</h1>
                <form action="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="post">
                    @csrf

                    @foreach($questionnaire->questions as $key=>$question)

                        <div class="card mt-3">
                            <div class="card-header"><strong>{{ $key + 1 }}. </strong>{{ $question->question }}</div>

                            <div class="card-body">
                                @error('responses.'.$key.'.answer_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <ul class="list-group">
                                    @foreach($question->answers as $answer)
                                        <li class="list-group-item">
                                            <label>

                                                <input type="radio" name="responses[{{$key}}][answer_id]"
                                                       value="{{ $answer->id }}"
                                                       {{ (old('responses.'.$key.'.answer_id')==$answer->id) ? 'checked' : '' }}
                                                       id="answers{{ $answer->id }}" class="mr-2"/>
                                                {{ $answer->answer }}

                                                <input type="hidden" name="responses[{{$key}}][question_id]"
                                                       value="{{ $question->id }}"/>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    <div class="card mt-4">
                        <div class="card-header">Your information</div>

                        <div class="card-body">


                            <div class="form-group">
                                <label for="name">Title</label>
                                <input name="survey[name]" type="name" class="form-control" id="name"
                                       aria-describedby="nameHelp" placeholder="Name">
                                <small id="nameHelp" class="form-text text-muted">Name</small>

                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="survey[email]" type="email" class="form-control" id="email"
                                       aria-describedby="emailHelp" placeholder="Email">
                                <small id="emailHelp" class="form-text text-muted">Email</small>

                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div>

                        <button class="btn btn-dark" type="submit">Save</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection
