@extends('main.app')
@section('page title', 'Ocularlens')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 card">
            <div class="card-body">
                <h4 class="card-title">Covid Record as of {{date('M d, Y',strtotime("-1 days"))}}</h4>
                <div class="row">
                    <div class="col-md-6">
                        <p>Total cases: {{number_format($record["total_cases"])}}</p>
                        <p>Total recoveries {{number_format($record["total_recoveries"])}}</p>
                        <p>Total deaths: {{number_format($record['total_deaths'])}}</p>                  
                    </div>
                    <div class="col-md-6">
                        <p>New cases: {{number_format($record['new_daily_cases'])}}</p>
                        <p>New deaths: {{number_format($record["new_daily_deaths"])}}</p>                
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection