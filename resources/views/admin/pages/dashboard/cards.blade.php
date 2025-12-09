<div class="row g-4 mt-5">
    {{-- <div class="col-md-4 ">
        <div class="card">
            <div class="card-body border-primary">
                <h5 class="card-title mb-2">Sammary clients</h5>
                <p class="card-text">
                    Total Client :<span class="fw-bold">{{ $clients_count }}</span>
                </p>
                <p class="card-text">
                    Total blocked :<span class="fw-bold">{{ $clients_blocked }}</span>
                </p>
                <p class="card-text">
                    Total with subscription :<span class="fw-bold">{{ $totalClientsWithSubscription }}</span>
                </p>

                <a href="{{ route('admin.client.index') }}" class="btn btn-primary btn-sm">Clients</a>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col--> --}}

    <div class="col-md-3">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="text-uppercase mb-3">Sammary clients</h5>
                        <p class="text-muted mb-2">Total Client</p>
                        <h3 class="mb-0 fw-normal"><span data-target="{{ $clients_count }}">{{ $clients_count }}</span>
                        </h3>
                        <p class="text-muted mb-2"> subscription </p>
                    </div>
                    <div>
                        <i data-lucide="users" class="text-muted fs-24 svg-sw-10"></i>
                    </div>
                </div>

                <div class="progress progress-lg mb-3">
                    @php
                    
                    if($clients_count == 0){
                        $clients_count = 1;
                    }
                    @endphp
                    <div class="progress-bar" style="width: {{$totalClientsWithSubscription / $clients_count * 100 }}%;"
                        role="progressbar"></div>
                </div>

                <div class="d-flex justify-content-between">
                    <div>
                        <span class="text-muted">Total with subscription</span>
                        <h5 class="mb-0">{{ $totalClientsWithSubscription }}</h5>
                    </div>
                    <div class="text-end">
                        <span class="text-muted">Total Blocked</span>
                        <h5 class="mb-0">{{ $clients_blocked }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted text-center">
                <a href="{{ route('admin.client.index') }}" class="btn btn-primary btn-sm">Clients</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="text-uppercase mb-3">Sammary Plan</h5>
                        <p class="text-muted mb-2">Total plans</p>
                        <h3 class="mb-0 fw-normal"><span data-target="{{ $plans_count }}">{{ $plans_count }}</span>
                        </h3>
                        <p class="text-muted mb-2"> visible </p>
                    </div>
                    <div>
                        <i data-lucide="users" class="text-muted fs-24 svg-sw-10"></i>
                    </div>
                </div>

                <div class="progress progress-lg mb-3">
                    @php
                    
                    if( $plans_count  == 0){
                         $plans_count  = 1;
                    }
                    @endphp
                    <div class="progress-bar" style="width: {{ $plans_visible  / $plans_count * 100 }}%;"
                        role="progressbar"></div>
                </div>

                <div class="d-flex justify-content-between">
                    <div>
                        <span class="text-muted">Plans visible</span>
                        <h5 class="mb-0">{{ $plans_visible }}</h5>
                    </div>
                    <div class="text-end">
                        <span class="text-muted">Plans disappear</span>
                        <h5 class="mb-0">{{ $plans_count - $plans_visible }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted text-center">
                <a href="{{ route('admin.plan.index') }}" class="btn btn-primary btn-sm">Plans</a>
            </div>
        </div>
    </div>

    {{-- <div class="col-md-4">
        <div class="card border-primary border border-dashed">
            <div class="card-body">
                <h5 class="card-title mb-2 text-primary">Sammary Plans</h5>
                <p class="card-text">
                    Total Plans :<span class="fw-bold">{{ $plans_count }}</span>
                </p>
                <p class="card-text">
                    Total visible :<span class="fw-bold">{{ $plans_visible }}</span>
                </p>

                <a href="{{ route('admin.plan.index') }}" class="btn btn-primary btn-sm">Plans</a>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col--> --}}

    <div class="col-md-3">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="text-uppercase mb-3">Sammary Subscription</h5>
                        <p class="text-muted mb-2">Total Subscription</p>
                        <h3 class="mb-0 fw-normal"><span data-target="{{ $subscription_count }}">{{ $subscription_count }}</span>
                        </h3>
                        <p class="text-muted mb-2"> Total active </p>
                    </div>
                    <div>
                        <i data-lucide="users" class="text-muted fs-24 svg-sw-10"></i>
                    </div>
                </div>

                <div class="progress progress-lg mb-3">
                    @php
                    
                    if( $subscription_count  == 0){
                         $subscription_count  = 1;
                    }
                    @endphp
                    <div class="progress-bar" style="width: {{ $subscription_active  / $subscription_count * 100 }}%;"
                        role="progressbar"></div>
                </div>

                <div class="d-flex justify-content-between">
                    <div>
                        <span class="text-muted">Total Active</span>
                        <h5 class="mb-0">{{ $subscription_active }}</h5>
                    </div>
                    <div class="text-end">
                        <span class="text-muted">Total cash</span>
                        <h5 class="mb-0">{{  $subscription_cash }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted text-center">
                <a href="{{ route('admin.subscribtion.index') }}" class="btn btn-primary btn-sm">subscription</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-primary border-2">
            <div class="card-body">
                <h5 class="card-title mb-2 text-primary">Sammary users</h5>
                <p class="card-text">
                    Total users :<span class="fw-bold">{{ App\Models\User::count() }}</span>
                </p>
                <br><br><br><br><br><br><br><br>
                {{-- <p class="card-text">
                    Total active :<span class="fw-bold">{{ $subscription_active }}</span>
                </p>
                <p class="card-text">
                    Total cash :<span class="fw-bold">{{ $subscription_cash }}</span>
                </p> --}}
                <a href="{{ route('admin.user.index') }}" class="btn btn-primary btn-sm">Users</a>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    
</div> <!-- end row -->