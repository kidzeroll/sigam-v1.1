<x-backend-layout>
    <x-slot name="title">Dashboard</x-slot>

    dashboard
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
        Modal
    </button>
    @push('modal')
        @include('layouts._modal')
    @endpush
</x-backend-layout>
