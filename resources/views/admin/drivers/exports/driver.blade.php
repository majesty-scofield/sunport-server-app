<table class="table table-hover">
    <thead>
        <tr>
            <th> @lang('view_pages.s_no')</th>
            <th> @lang('view_pages.date')</th>
            <th> @lang('view_pages.name')</th>
            <th> @lang('view_pages.email')</th>
            <th> @lang('view_pages.mobile')</th>
            @if($app_for !== 'taxi' && $app_for !== 'delivery')
            <th> @lang('view_pages.transport_type')</th>
            @endif
            <th> @lang('view_pages.vehicle_type')</th>
            <!-- <th> @lang('view_pages.status')</th> -->
            <th> @lang('view_pages.approve_status')</th>
        </tr>
    </thead>
    <tbody>
        @php $i= 1; @endphp

        @forelse($results as $key => $result)
            <tr>
                <td>{{ $i++ }} </td>
                <td>{{ $result->created_at->format("m/d/Y") }} </td>
                <td> {{ $result->name }}</td>
                <td>{{ $result->email }}</td>
                @if (env('APP_FOR') === 'demo')
                <td>{{ "**********" }}</td>
                @else
                
                <td>{{ $result->countryDetail ? $result->countryDetail->dial_code : '0' }}{{ " ".$result->mobile }}</td>
                @endif
                @if($app_for !== 'taxi' && $app_for !== 'delivery')
                <td>{{ $result->transport_type }}</td>
                @endif
              
                <td>
                    @foreach($result->driverVehicleTypeDetail as $vehicleType)
                    {{ $vehicleType->vehicleType->name.',' }}
                    @endforeach
                </td>

                @if ($result->approve)
                    <td><span class="label label-success">@lang('view_pages.approved')</span></td>
                @else
                    <td><span class="label label-danger">@lang('view_pages.disapproved')</span></td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="11">
                    <h4 class="text-center" style="color:#333;font-size:25px;">@lang('view_pages.no_data_found')</h4>
                </td>
            </tr>
        @endforelse

    </tbody>
</table>
