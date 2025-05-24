<table class="table">
    <thead>
        <tr>
            <th>Task ID</th>
            <th>Task</th>
            <th>Service</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($allTasks as $task)
            <tr>
                <td>{{ $task->task_id }}</td>
                <td>{{ $task->task }}</td>
                <td>{{ $task->service ? $task->service->name : 'No Company' }}</td>
                <td>{{ $task->created_at->format('Y-m-d') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-3">
    {{ $allTasks->withQueryString()->links() }}
</div>
