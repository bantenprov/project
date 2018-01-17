<div>
    <a href="{{ route('projectCreate') }}">Tambah data</a>
    <hr>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Project Name</th>
            <th>OPD</th>
            <th>Staf</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @forelse($projects as $key => $project)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>
                <a href="{{ route('projectShow',$project->id) }}">{{ $project->name }}</a>
            </td>
            <td>{{ $project->getOpd->name }}</td>
            <td>{{ $project->getStaf->full_name }}</td>
            <td>{{ $project->start_date }}</td>
            <td>{{ $project->end_date }}</td>
            <td>{{ $project->description }}</td>
            <td>
                <a href="{{ route('projectEdit',$project->id) }}">Edit</a>
                <a href="{{ route('projectDelete',$project->id) }}">Delete</a>
            </td>            
        </tr>
        @empty
            <tr>
                <td colspan='7' align="center">belum ada data</td>
            </tr>
        @endforelse
    </table>

</div>