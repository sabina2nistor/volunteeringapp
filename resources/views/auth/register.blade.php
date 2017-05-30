@extends('main')

@section('container')
<div id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nume</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- start adaugate noi --}}
                            

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="title">Asociatie</label>
                                <div class="col-md-6">
                                    <select name="association" id="association" class="form-control" style="width:350px">
                                        <option value="">--- Selecteaza Asociatie ---</option>
                                        @foreach ($associations as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="title">Departament</label>
                                <div class="col-md-6">
                                    <select name="department_id" id="department_id" class="form-control" style="width:350px">
                                    </select>

                                </div>
                                 
                            </div>
                            <div class="checkbox" style="margin-bottom: 25px">
                                        <label class="col-md-6 col-md-offset-4 control-label" >
                                          <input name="admin" id="admin" type="checkbox" > Bifeaza daca doresti sa creezi un cont de ADMIN
                                        </label>
                                        
                            </div>

                            
                            {{-- end adaugate noi --}}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Parola</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirmare Parola</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-warning">
                                        Inregistrare
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')


<!--  Script for dependent drop downs.   -->

<script>

    $('#association').on('change',function(e){
        console.log(e);
        var assoc_id = e.target.value;

        $.get('/register/ajax' + assoc_id, function(data){

            $('#department_id').empty();
            $.each(JSON.parse(data), function(index, deptObj){


                $('#department_id').append('<option value="' + deptObj.id + '">' + deptObj.name +'</option>');
            });
        });
    });

</script>
<script>
function toggleSelection(e){
    var el = '#' + e.data;
    console.log(arguments);
    if (this.checked) {
        $(el).attr('disabled', 'disabled');
    } else {
        $(el).removeAttr('disabled');
    }
}

$(function() {
    $('#admin').click('association', toggleSelection);
    $('#admin').click('department', toggleSelection);
});
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@stop
