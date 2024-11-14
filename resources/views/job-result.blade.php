<h2>Job Listings</h2>

@if($jobs->isEmpty())
    <p>No jobs found.</p>
@else
    <ul>
        @foreach($jobs as $job)
            <li>
                Category: {{ $job->category }}
                <br>
                Company Name: {{ $job->company_name }}
                <br>
                 Position: {{ $job->position }}
                <br>
                Location: ({{ $job->location }})
                <br>  
                Description: {{ $job->description }} 
                <br>
                Allowance: {{ $job->allowance }}
                <br>
                <a href="/">Apply Job</a>
            </li>
        @endforeach
    </ul>
@endif
