@if (isset($payments) && !is_null($payments) && $payments->count() != 0)
<div class="table-responsive">
    <table class=" table table-bordered table-striped table-hover datatable">
        <thead>
            <tr>
                <th>
                    {{ trans('cruds.payment.fields.type') }}
                </th>
                <th>
                    {{ trans('cruds.payment.fields.amount') }}
                </th>
                <th>
                    {{ trans('cruds.payment.fields.when') }}
                </th>
                <th>
                    {{ trans('cruds.payment.fields.method') }}
                </th>
                <th>
                    {{ trans('cruds.payment.fields.status') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $key => $payment)
                <tr data-entry-id="{{ $payment->id }}">
                    <td>
                        {{ $payment->payment_type ?? '' }}
                    </td>
                    <td>
                        {{ $payment->amount ?? '' }} $
                    </td>
                    <td>
                        {{ $payment->updated_at ?? '' }}
                    </td>
                    <td>
                        {{ $payment->payment_method->name ?? '' }}
                    </td>
                    <td>
                        <span class="badge {{ $payment->payment_status->getClassSpanName() }}">{{ $payment->payment_status->name ?? '' }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif