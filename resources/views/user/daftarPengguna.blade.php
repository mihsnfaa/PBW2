{{--M Ihsan F A 6706220088--}}
<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between items-center"> <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200
        leading-tight"> {{ __('Daftar Pengguna') }} <a href="{{ route('user.registrasi') }}" class="ml-4 text-blue-500
        hover:underline"> {{ __('Register User') }} </a>
        </h2> </div> </x-slot>

        <div class="py-12"> <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto shadow-md sm:rounded-lg"> <table class="w-full text-sm text-left text-gray-700
                dark:text-gray-400"> <thead class="text-xs bg-blue-500 text-white">
                <tr>
                <th class="px-6 py-3">No</th>
                <th class="px-6 py-3">Full Name</th>
                <th class="px-6 py-3">Email</th>
                <th class="px-6 py-3">Username</th>
                <th class="px-6 py-3">Alamat</th>
                <th class="px-6 py-3">No.Phone</th>
                <th class="px-6 py-3">Tanggal Lahir</th>
                <th class="px-6 py-3">Agama</th>
                <th class="px-6 py-3">Jenis Kelamin</th>
                <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <td class="px-6 py-4 font-medium">
                {{ $loop->iteration }}
                </td>
                <td class="px-6 py-4">{{ $user->fullname }}</td>
                <td class="px-6 py-4">{{ $user->email }}</td>
                <td class="px-6 py-4">{{ $user->username }}</td>
                <td class="px-6 py-4">{{ $user->address }}</td>
                <td class="px-6 py-4">{{ $user->phoneNumber }}</td>
                <td class="px-6 py-4">{{ $user->birthdate }}</td>
                <td class="px-6 py-4">{{ $user->agama }}</td>
                <td class="px-6 py-4">
                    @if ($user->jenis_kelamin == 0)
                    <span>Pria</span>
                    @else
                    <span>Wanita</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="flex">
                        <x-edit-button class="ml-4 text-yellow-500">{{ __('edit') }}</x-edit-button>
                        <form action="{{ route('user.infoPengguna', $user) }}">
                            <x-view-button class="ml-4 text-orange-500">{{ __('view') }}</x-view-button>
                        </form>
                        <x-hapus-button class="ml-4 text-red-500">{{ __('Hapus') }}</x-hapus-button>
                    </div>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
    </x-app-layout>