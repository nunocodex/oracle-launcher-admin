@extends('installer::install')

@section('step')
    <p class="pb-3 text-gray-800">
        Below you should enter your database connection details. If you're not sure about these, contact your hosting
        provider.
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

    <form method="post" action="{{ route('install.database') }}">
        @csrf

        <div class="mb-3">
            <x-installer::label for="database_hostname" :required="true">Database host</x-installer::label>
            <x-installer::input
                id="database_hostname"
                name="database_hostname"
                value="{{ old('database_hostname', config('database.connections.oracle-admin-panel.host')) }}"
                :required="true"
            />
        </div>
        <div class="mb-3">
            <x-installer::label for="database_port" :required="true">Database port</x-installer::label>
            <x-installer::input
                id="database_port"
                name="database_port"
                value="{{ old('database_port', config('database.connections.oracle-admin-panel.port')) }}"
                :required="true"
            />
        </div>
        <div class="mb-3">
            <x-installer::label for="database_name" :required="true">Database name</x-installer::label>
            <x-installer::input
                id="database_name"
                name="database_name"
                value="{{ old('database_name', config('database.connections.oracle-admin-panel.database', 'laravel')) }}"
                :required="true"
            />
        </div>
        <div class="mb-3">
            <x-installer::label for="database_username" :required="true">Database user</x-installer::label>
            <x-installer::input
                id="database_username"
                name="database_username"
                value="{{ old('database_username', config('database.connections.oracle-admin-panel.username', 'root')) }}"
                :required="true"
            />
        </div>
        <div class="mb-3">
            <x-installer::label for="database_password">Database password</x-installer::label>
            <x-installer::input
                id="database_password"
                name="database_password"
                type="password"
                value="{{ old('database_password') }}"
            />
        </div>
        <div class="mb-3">
            <x-installer::label for="database_prefix">Database prefix</x-installer::label>
            <x-installer::input
                id="database_prefix"
                name="database_prefix"
                value="{{ old('database_prefix') }}"
            />
        </div>

        <hr>

        <h2>Database Vision</h2>

        <div class="mb-3">
            <x-installer::label for="database_vision_hostname" :required="true">Database host</x-installer::label>
            <x-installer::input
                id="database_vision_hostname"
                name="database_vision_hostname"
                value="{{ old('database_vision_hostname', config('database.connections.oracle-vision-api.host')) }}"
                :required="true"
            />
        </div>
        <div class="mb-3">
            <x-installer::label for="database_vision_port" :required="true">Database port</x-installer::label>
            <x-installer::input
                id="database_vision_port"
                name="database_vision_port"
                value="{{ old('database_vision_port', config('database.connections.oracle-vision-api.port')) }}"
                :required="true"
            />
        </div>
        <div class="mb-3">
            <x-installer::label for="database_vision_name" :required="true">Database name</x-installer::label>
            <x-installer::input
                id="database_vision_name"
                name="database_vision_name"
                value="{{ old('database_vision_name', config('database.connections.oracle-vision-api.database', 'laravel')) }}"
                :required="true"
            />
        </div>
        <div class="mb-3">
            <x-installer::label for="database_vision_username" :required="true">Database user</x-installer::label>
            <x-installer::input
                id="database_vision_username"
                name="database_vision_username"
                value="{{ old('database_vision_username', config('database.connections.oracle-vision-api.username', 'root')) }}"
                :required="true"
            />
        </div>
        <div class="mb-3">
            <x-installer::label for="database_vision_password">Database password</x-installer::label>
            <x-installer::input
                id="database_vision_password"
                name="database_vision_password"
                type="password"
                value="{{ old('database_vision_password') }}"
            />
        </div>
        <div class="mb-3">
            <x-installer::label for="database_vision_prefix">Database prefix</x-installer::label>
            <x-installer::input
                id="database_vision_prefix"
                name="database_vision_prefix"
                value="{{ old('database_vision_prefix') }}"
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
