@extends('installer::install')

@section('step')
    <p class="pb-3 text-gray-800">
        Below you should enter admin user. You can skip it if you have already access to admin panel.
    </p>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="bg-red-100 border-l-4 border-red-500 p-4 mb-3">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm leading-5 text-red-700">
                            {!! $error !!}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <form method="post" action="{{ route('install.admin') }}">
        @csrf

        <div class="mb-3">
            <x-installer::label for="admin_username" :required="false">Admin username</x-installer::label>
            <x-installer::input
                id="admin_username"
                name="admin_username"
                value="{{ old('admin_username') }}"
                :required="false"
            />
        </div>

        <div class="mb-3">
            <x-installer::label for="admin_email" :required="false">Admin email</x-installer::label>
            <x-installer::input
                id="admin_email"
                name="admin_email"
                type="email"
                value="{{ old('admin_email') }}"
                :required="false"
            />
        </div>

        <div class="mb-3">
            <x-installer::label for="admin_password" :required="false">Admin password</x-installer::label>
            <x-installer::input
                id="admin_password"
                name="admin_password"
                type="password"
                value="{{ old('admin_password') }}"
                :required="false"
            />
        </div>

        <div class="flex justify-end">
            <x-installer::button type="submit">
                Next step
                <svg class="fill-current w-5 h-5 ml-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                     fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                          clip-rule="evenodd"/>
                </svg>
            </x-installer::button>
        </div>
    </form>
@endsection
