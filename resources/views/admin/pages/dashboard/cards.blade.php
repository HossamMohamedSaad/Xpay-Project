
<div class="row g-4 mt-5">
    <div class="col-md-4 ">
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
    </div> <!-- end col-->

    <div class="col-md-4">
        <div class="card border-primary border border-dashed">
            <div class="card-body">
                <h5 class="card-title mb-2 text-primary">Sammary clients</h5>
                <p class="card-text">
                    Total Plans :<span class="fw-bold">{{ $plans_count }}</span>
                </p>
                <p class="card-text">
                    Total visible :<span class="fw-bold">{{ $plans_visible }}</span>
                </p>
                
                <a href="{{ route('admin.plan.index') }}" class="btn btn-primary btn-sm">Plans</a>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-md-4">
        <div class="card border-primary border-2">
            <div class="card-body">
                <h5 class="card-title mb-2 text-primary">Sammary Subscription</h5>
                <p class="card-text">
                    Total Subscription :<span class="fw-bold">{{ $subscription_count }}</span>
                </p>
                <p class="card-text">
                    Total active :<span class="fw-bold">{{ $subscription_active }}</span>
                </p>
                <p class="card-text">
                    Total cash :<span class="fw-bold">{{ $subscription_cash }}</span>
                </p>
                <a href="javascript: void(0);" class="btn btn-primary btn-sm">Button</a>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div> <!-- end row -->