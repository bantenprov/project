<div>

<a href="{{ route('projectIndex') }}">List</a>
<hr>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('message'))
    <li>{{ session()->get('message') }}</li>
@endif
{!! Form::open(['route' => 'projectStore','method' => 'post']) !!}

    <table>        
        <tr>
            <td>Staf</td>
            <td>
                <select name="staf_id">
                    <option value="" selected disabled>-Select Staf-</option>
                    @foreach($stafs as $staf)
                        <option value="{{ $staf->id }}">{{ $staf->full_name }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>Name</td>
            <td>                
                {!! Form::text('name') !!}                
            </td>
        </tr>
        <tr>
            <td>Start date</td>
            <td>                
                {!! Form::text('start_date') !!}                
            </td>
        </tr>
        <tr>
            <td>End date</td>
            <td>                
                {!! Form::text('end_date') !!}                
            </td>
        </tr>
        <tr>
            <td valign="top">Description</td>
            <td>            
                {!! Form::textarea('description') !!}                
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>            
                {!! Form::submit('submit') !!}                
            </td>
        </tr>
    </table>
    
     
{!! Form::close() !!}

</div>