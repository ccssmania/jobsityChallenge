<div class=" container">
    <div class="tile user-settings">
        <div class="col-md-8 mx-auto">
            <form action="{{$url}}" method="{{$method}}" class="form-horizontal" >
                @csrf
                <div class=" form-group">
                    <label class="control-label"> Title </label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $entry->title }}" required autocomplete="title" placeholder="Enter the title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class=" form-group">
                    <label class="control-label"> Content </label>
                    <textarea class="form-control" placeholder="enter the content" id="textarea" name="content" autocomplete required > {{$entry->content}} </textarea>

                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row mb-12">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>