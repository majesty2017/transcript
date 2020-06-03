@include('modals.enterTokenModal')
@include('modals.generateTokenModal')
<div class="card">
    <div class="card-header">
        <div class="card-title">Transcript</div>
    </div>
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#generateTokenModal">
                    Generate Token
                </button>
            </div>
            <div class="col-md-6">
                @if($voucher_code)
                    <p>Your code is: <b class="code">{{ $voucher_code }}</b></p>
                @endif
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#enterTokenModal">
                Enter Token
            </button>
        </div>
    </div>
</div>
