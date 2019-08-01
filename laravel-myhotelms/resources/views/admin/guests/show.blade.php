@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.guest.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.guest.fields.id') }}
                        </th>
                        <td>
                            {{ $guest->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guest.fields.first_name') }}
                        </th>
                        <td>
                            {{ $guest->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guest.fields.last_name') }}
                        </th>
                        <td>
                            {{ $guest->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guest.fields.address') }}
                        </th>
                        <td>
                            {{ $guest->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guest.fields.email') }}
                        </th>
                        <td>
                            {{ $guest->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guest.fields.phone') }}
                        </th>
                        <td>
                            {{ $guest->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guest.fields.city') }}
                        </th>
                        <td>
                            {{ $guest->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guest.fields.country') }}
                        </th>
                        <td>
                            {{ $guest->country }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection