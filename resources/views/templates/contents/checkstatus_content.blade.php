<!-- Breadcrumbs-->
{{--<ol class="breadcrumb">--}}
{{--    <li class="breadcrumb-item">--}}
{{--        <a href="{{ route('home') }}">Dashboard</a>--}}
{{--    </li>--}}
{{--    <li class="breadcrumb-item active">Overview</li>--}}
{{--</ol>--}}

<div class="card">
    <div class="card-header">
        HTU Transcript Management System
    </div>
    <div class="card-body">
        <div class="card-title">
            <h3 class="text text-info">Check this status to complete your transaction.</h3>
        </div>

        <div class="row">
            <div class="col-md-4">
                <form action="{{ route('checkme') }}" method="post">
                    @csrf

                    <div class="form-row align-items-center">
                        <div class="col-auto my-1">
                            <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                            <select class="custom-select mr-sm-2" name="checkstatus" id="inlineFormCustomSelect">
                                <option selected>Choose...</option>
                                @foreach($givestatus as $status)
                                <option value="{{ $status->xref_id }}">{{ $status->xref_id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto my-1">
                            <button type="submit" class="btn btn-primary">Check status</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
