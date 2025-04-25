<x-layout>
    <x-slot name="sidebar">
        @include('components.sidebar')
    </x-slot>

    <div class="container-fluid py-4">
        <h1 class="mb-4">Dashboard Admin</h1>

            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        <!-- Panoramica Cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card h-100 border-left-primary shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Dipendenti</div>
                                <div class="h5 mb-0 font-weight-bold">{{ $employeeCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-sm btn-primary mt-3">Gestisci Dipendenti</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card h-100 border-left-success shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Corsi Formativi</div>
                                <div class="h5 mb-0 font-weight-bold">{{ \App\Models\Course::count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-sm btn-success mt-3">Gestisci Corsi</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card h-100 border-left-info shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ticket Attivi</div>
                                <div class="h5 mb-0 font-weight-bold">{{ $activeTicketCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        <a href="{{ route('admin.tickets.index') }}" class="btn btn-sm btn-info mt-3">Visualizza Ticket</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card h-100 border-left-warning shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Checklist Attive</div>
                                <div class="h5 mb-0 font-weight-bold">{{ \App\Models\Checklist::count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tasks fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        <a href="{{ route('admin.checklists.index') }}" class="btn btn-sm btn-warning mt-3">Gestisci Checklist</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafici e Statistiche -->
        <div class="row mb-4">
            <div class="col-lg-8 mb-4">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold">Stato Onboarding Dipendenti</h6>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="periodDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Ultimi 30 giorni
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="periodDropdown">
                                <li><a class="dropdown-item" href="#">Ultimi 7 giorni</a></li>
                                <li><a class="dropdown-item" href="#">Ultimi 30 giorni</a></li>
                                <li><a class="dropdown-item" href="#">Ultimi 90 giorni</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="onboardingChart" height="300"></canvas>

                        <div class="mt-4">
                            <h6 class="font-weight-bold">Stato Onboarding</h6>

                            @php
                                $allEmployees = \App\Models\User::whereHas('roles', function($q) {
                                    $q->whereIn('name', ['employee', 'new_hire']);
                                })->get();

                                $notStarted = 0;
                                $inProgress = 0;
                                $completed = 0;

                                foreach ($allEmployees as $employee) {
                                    $coursesAssigned = $employee->courses()->count();
                                    if ($coursesAssigned == 0) {
                                        $notStarted++;
                                        continue;
                                    }

                                    $coursesCompleted = $employee->courses()->wherePivot('status', 'completed')->count();
                                    if ($coursesCompleted == $coursesAssigned) {
                                        $completed++;
                                    } else {
                                        $inProgress++;
                                    }
                                }

                                $totalEmployees = count($allEmployees);
                                $notStartedPercentage = $totalEmployees > 0 ? round(($notStarted / $totalEmployees) * 100) : 0;
                                $inProgressPercentage = $totalEmployees > 0 ? round(($inProgress / $totalEmployees) * 100) : 0;
                                $completedPercentage = $totalEmployees > 0 ? round(($completed / $totalEmployees) * 100) : 0;
                            @endphp

                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="border rounded p-3 bg-light">
                                        <h3 class="text-danger mb-0">{{ $notStarted }}</h3>
                                        <p class="mb-0">Non iniziati</p>
                                        <div class="progress mt-2" style="height: 5px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $notStartedPercentage }}%" aria-valuenow="{{ $notStartedPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="border rounded p-3 bg-light">
                                        <h3 class="text-warning mb-0">{{ $inProgress }}</h3>
                                        <p class="mb-0">In corso</p>
                                        <div class="progress mt-2" style="height: 5px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $inProgressPercentage }}%" aria-valuenow="{{ $inProgressPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="border rounded p-3 bg-light">
                                        <h3 class="text-success mb-0">{{ $completed }}</h3>
                                        <p class="mb-0">Completati</p>
                                        <div class="progress mt-2" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $completedPercentage }}%" aria-valuenow="{{ $completedPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold">Stato Dipendenti</h6>
                    </div>
                        <div class="card-body">
                        <canvas id="employeeStatusChart" height="260"></canvas>

                        @php
                            $activeUsers = \App\Models\User::whereHas('roles', function($q) {
                                $q->whereIn('name', ['employee', 'new_hire']);
                            })->where('status', 'active')->count();

                            $pendingUsers = \App\Models\User::whereHas('roles', function($q) {
                                $q->whereIn('name', ['employee', 'new_hire']);
                            })->where('status', 'pending')->count();

                            $blockedUsers = \App\Models\User::whereHas('roles', function($q) {
                                $q->whereIn('name', ['employee', 'new_hire']);
                            })->where('status', 'blocked')->count();
                        @endphp

                        <div class="mt-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span><i class="fas fa-circle text-success"></i> Attivi</span>
                                <span>{{ $activeUsers }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <span><i class="fas fa-circle text-warning"></i> In attesa</span>
                                <span>{{ $pendingUsers }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <span><i class="fas fa-circle text-danger"></i> Bloccati</span>
                                <span>{{ $blockedUsers }}</span>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>

        <!-- Sezione Statistiche Avanzamento -->
        <div class="row mb-4">
            <div class="col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold">Stato Completamento Attività</h6>
                    </div>
                        <div class="card-body">
                        @php
                            $totalEmployees = $employeeCount;

                            $completedChecklists = \App\Models\UserChecklistItem::whereHas('user', function($q) {
                                $q->whereHas('roles', function($q) {
                                    $q->where('name', 'employee');
                                });
                            })
                            ->where('status', 'completed')
                            ->count();

                            $totalChecklists = \App\Models\UserChecklistItem::whereHas('user', function($q) {
                                $q->whereHas('roles', function($q) {
                                    $q->where('name', 'employee');
                                });
                            })->count();

                            $checklistPercentage = $totalChecklists > 0 ? ($completedChecklists / $totalChecklists) * 100 : 0;
                        @endphp

                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Checklist completate</span>
                                <span>{{ $completedChecklists }} / {{ $totalChecklists }}</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $checklistPercentage }}%" aria-valuenow="{{ $checklistPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        @php
                            $completedDocuments = \App\Models\Document::where('status', 'approved')->count();
                            $totalDocuments = \App\Models\Document::count();
                            $documentPercentage = $totalDocuments > 0 ? ($completedDocuments / $totalDocuments) * 100 : 0;
                        @endphp

                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Documenti approvati</span>
                                <span>{{ $completedDocuments }} / {{ $totalDocuments }}</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: {{ $documentPercentage }}%" aria-valuenow="{{ $documentPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        @php
                            $totalCourses = \App\Models\Course::count();
                            $completedCourses = DB::table('course_user')->where('status', 'completed')->count();
                            $assignedCourses = DB::table('course_user')->count();
                            $coursePercentage = $assignedCourses > 0 ? ($completedCourses / $assignedCourses) * 100 : 0;
                        @endphp

                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Corsi completati</span>
                                <span>{{ $completedCourses }} / {{ $assignedCourses }}</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $coursePercentage }}%" aria-valuenow="{{ $coursePercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

            <div class="col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold">Completamento per Reparto</h6>
                    </div>
                        <div class="card-body">
                        <canvas id="departmentChart" height="250"></canvas>

                        <div class="mt-3">
                            <h6 class="font-weight-bold">Dettaglio Completamento</h6>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Dipartimento</th>
                                            <th>Completamento</th>
                                            <th>Progresso</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($departmentStats as $dept => $percentage)
                                            <tr>
                                                <td>{{ $dept }}</td>
                                                <td class="text-center">{{ $percentage }}%</td>
                                                <td>
                                                    <div class="progress" style="height: 6px;">
                                                        <div class="progress-bar
                                                            @if($percentage >= 75)
                                                                bg-success
                                                            @elseif($percentage >= 50)
                                                                bg-info
                                                            @elseif($percentage >= 25)
                                                                bg-warning
                                                            @else
                                                                bg-danger
                                                            @endif
                                                        " role="progressbar" style="width: {{ $percentage }}%"
                                                        aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sezione Attività Recenti e Utenti Recenti -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold">Attività Recenti</h6>
                        <a href="#" class="btn btn-sm btn-primary">Vedi Tutte</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @foreach(\App\Models\UserChecklistItem::with('user', 'checklistItem')->orderBy('updated_at', 'desc')->take(5)->get() as $activity)
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $activity->user->name }}</strong> ha {{ $activity->status === 'completed' ? 'completato' : 'aggiornato' }}:
                                        {{ Str::limit($activity->checklistItem->text, 50) }}
                                    </div>
                                    <small class="text-muted">{{ $activity->updated_at->diffForHumans() }}</small>
                                </div>
                            @endforeach

                            @foreach(DB::table('course_user')->join('users', 'course_user.user_id', '=', 'users.id')
                                    ->join('courses', 'course_user.course_id', '=', 'courses.id')
                                    ->select('users.name as user_name', 'courses.title as course_title', 'course_user.updated_at', 'course_user.status')
                                    ->orderBy('course_user.updated_at', 'desc')
                                    ->take(5)
                                    ->get() as $courseActivity)
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $courseActivity->user_name }}</strong> ha {{ $courseActivity->status === 'completed' ? 'completato' : ($courseActivity->status === 'in_progress' ? 'iniziato' : 'ricevuto') }} il corso:
                                        {{ Str::limit($courseActivity->course_title, 50) }}
                                    </div>
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($courseActivity->updated_at)->diffForHumans() }}</small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold">Nuovi Dipendenti</h6>
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-sm btn-primary">Vedi Tutti</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Ruolo</th>
                                        <th>Data Registrazione</th>
                                        <th>Stato</th>
                                        <th>Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $newEmployees = \App\Models\User::whereHas('roles', function($q) {
                                            $q->whereIn('name', ['employee', 'new_hire']);
                                        })->orderBy('created_at', 'desc')->take(5)->get();
                                    @endphp

                                    @foreach($newEmployees as $employee)
                                        <tr>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>
                                                @foreach($employee->roles as $role)
                                                    <span class="badge bg-primary">{{ $role->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>{{ $employee->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <span class="badge {{ $employee->status === 'active' ? 'bg-success' : ($employee->status === 'pending' ? 'bg-warning' : 'bg-danger') }}">
                                                    {{ $employee->status }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.employees.show', $employee) }}" class="btn btn-sm btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.employees.edit', $employee) }}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Grafico stato dipendenti
            const employeeStatusChart = new Chart(
                document.getElementById('employeeStatusChart'),
                {
                    type: 'doughnut',
                    data: {
                        labels: ['Attivi', 'In attesa', 'Bloccati'],
                        datasets: [{
                            data: [{{ $activeUsers }}, {{ $pendingUsers }}, {{ $blockedUsers }}],
                            backgroundColor: ['#1cc88a', '#f6c23e', '#e74a3b'],
                            hoverBackgroundColor: ['#17a673', '#dda20a', '#c43b2f'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                boxWidth: 20,
                                padding: 10
                            }
                        },
                        cutout: '70%'
                    }
                }
            );

            // Grafico onboarding
            const onboardingChart = new Chart(
                document.getElementById('onboardingChart'),
                {
                    type: 'line',
                    data: {
                        labels: ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'],
                        datasets: [
                            {
                                label: 'Assunzioni',
                                lineTension: 0.3,
                                backgroundColor: "rgba(78, 115, 223, 0.05)",
                                borderColor: "rgba(78, 115, 223, 1)",
                                pointRadius: 3,
                                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                                pointBorderColor: "rgba(78, 115, 223, 1)",
                                pointHoverRadius: 3,
                                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                                pointHitRadius: 10,
                                pointBorderWidth: 2,
                                data: [
                                    {{ $monthsData['hiring'][1] }},
                                    {{ $monthsData['hiring'][2] }},
                                    {{ $monthsData['hiring'][3] }},
                                    {{ $monthsData['hiring'][4] }},
                                    {{ $monthsData['hiring'][5] }},
                                    {{ $monthsData['hiring'][6] }},
                                    {{ $monthsData['hiring'][7] }},
                                    {{ $monthsData['hiring'][8] }},
                                    {{ $monthsData['hiring'][9] }},
                                    {{ $monthsData['hiring'][10] }},
                                    {{ $monthsData['hiring'][11] }},
                                    {{ $monthsData['hiring'][12] }}
                                ]
                            },
                            {
                                label: 'Onboarding Completati',
                                lineTension: 0.3,
                                backgroundColor: "rgba(28, 200, 138, 0.05)",
                                borderColor: "rgba(28, 200, 138, 1)",
                                pointRadius: 3,
                                pointBackgroundColor: "rgba(28, 200, 138, 1)",
                                pointBorderColor: "rgba(28, 200, 138, 1)",
                                pointHoverRadius: 3,
                                pointHoverBackgroundColor: "rgba(28, 200, 138, 1)",
                                pointHoverBorderColor: "rgba(28, 200, 138, 1)",
                                pointHitRadius: 10,
                                pointBorderWidth: 2,
                                data: [
                                    {{ $monthsData['completed'][1] }},
                                    {{ $monthsData['completed'][2] }},
                                    {{ $monthsData['completed'][3] }},
                                    {{ $monthsData['completed'][4] }},
                                    {{ $monthsData['completed'][5] }},
                                    {{ $monthsData['completed'][6] }},
                                    {{ $monthsData['completed'][7] }},
                                    {{ $monthsData['completed'][8] }},
                                    {{ $monthsData['completed'][9] }},
                                    {{ $monthsData['completed'][10] }},
                                    {{ $monthsData['completed'][11] }},
                                    {{ $monthsData['completed'][12] }}
                                ]
                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: "rgba(0, 0, 0, 0.05)"
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                }
            );

            // Grafico per dipartimento
            const departmentChart = new Chart(
                document.getElementById('departmentChart'),
                {
                    type: 'bar',
                    data: {
                        labels: [
                            @foreach($departmentStats as $dept => $percentage)
                                '{{ $dept }}',
                            @endforeach
                        ],
                        datasets: [
                            {
                                label: 'Completamento %',
                                backgroundColor: [
                                    'rgba(78, 115, 223, 0.8)',
                                    'rgba(28, 200, 138, 0.8)',
                                    'rgba(246, 194, 62, 0.8)',
                                    'rgba(231, 74, 59, 0.8)',
                                    'rgba(54, 185, 204, 0.8)'
                                ],
                                hoverBackgroundColor: [
                                    'rgba(78, 115, 223, 1)',
                                    'rgba(28, 200, 138, 1)',
                                    'rgba(246, 194, 62, 1)',
                                    'rgba(231, 74, 59, 1)',
                                    'rgba(54, 185, 204, 1)'
                                ],
                                borderWidth: 1,
                                data: [
                                    @foreach($departmentStats as $percentage)
                                        {{ $percentage }},
                                    @endforeach
                                ]
                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100,
                                grid: {
                                    color: "rgba(0, 0, 0, 0.05)"
                                },
                                ticks: {
                                    callback: function(value) {
                                        return value + "%";
                                    }
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                }
            );
        });
    </script>
    @endpush
</x-layout>
