<x-index-layout>
    <x-slot:header>
        <x-page-header>
            New Task
        </x-page-header>
    </x-slot>

    {{-- SWITH TO MODAL FROM THE INDEX PAGE --}}
    <form action="/task/store" method="POST">
        @csrf
        <x-form.form-layout />
    </form>
</x-index-layout>