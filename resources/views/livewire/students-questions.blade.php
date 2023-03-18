<div>
    <div>
        <div class="card card-statistics mb-30">
            <div class="card-body">
                <h5 class="card-title"> {{$questions[$counter]->title}}</h5>

                @foreach(preg_split('/(-)/', $questions[$counter]->answers) as $index=>$answer)
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio{{$index}}" name="customRadio" class="custom-control-input" >
                        <label class="custom-control-label" for="customRadio{{$index}}" wire:click="nextquestion({{ $questions[$counter]->id }},{{ $questions[$counter]->score}},'{{  $answer }}','{{ $questions[$counter]->right_answer}}')"> {{ $answer }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
