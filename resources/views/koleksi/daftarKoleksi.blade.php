{{--M Ihsan F A 6706220088--}}
<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between items-center"> <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200
        leading-tight"> {{ __('Daftar koleksi') }} <a href="{{ route('koleksi.registrasi') }}" class="ml-4 text-blue-500
        hover:underline"> {{ __('Register collection') }} </a>
        </h2> </div> </x-slot>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                <th scope="col" class="px-6 py-3">
                No
                </th>
                <th scope="col" class="px-6 py-3">
                Nama Koleksi
                </th>
                <th scope="col" class="px-6 py-3">
                Jensi Koleksi
                </th>
                <th scope="col" class="px-6 py-3">
                Jumlah Koleksi
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Aksi
                    </th>
                    </tr>
            </thead>
            <tbody>
            @foreach ($collections as $collection)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <td
                class="px-6 py-4 font-medium {{ $loop->iteration % 2 == 0 ? 'bg-gray-800 dark:text-gray-200' :
                'bg-gray-900 dark:text-gray-400' }} space-nowrap ">
                {{ $loop->iteration }}
                </td>
                <td class="px-6 py-4 {{ $loop->iteration % 2==0 ? 'bg-gray-800 dark:text-gray-200' : 'bg-gray-900
                    dark:text-gray-400' }}"> {{ $collection->namaKoleksi }} </td>
                    <td
                    class=" px-6 py-4 {{ $loop->iteration % 2 == 0 ? 'bg-gray-800 dark:text-gray-200' : 'bg-gray-900
                    dark:text-gray-400' }}">
                    @if ($collection->jenisKoleksi == 1)
                    <span>Buku</span>
                    @elseif ($collection->jenisKoleksi == 2)
                    <span>Majalah</span>
                    @else
                    <span>Cakram Digital</span>
                    @endif
                </td>
                <td
                class="px-6 py-4 {{ $loop->iteration % 2 == 0 ? 'bg-gray-800 dark:text-gray-200' : 'bg-gray-900
                dark:text-gray-400' }}">
                {{ $collection->jumlahKoleksi }}
                </td>
                <td
                    class="px-6 py-4 {{ $loop->iteration % 2 == 0 ? 'bg-gray-800 dark:text-gray-200' : 'bg-gray-900 dark:text-gray-400' }}">
                    <div class="flex">
                        <x-edit-button class="ml-4">
                            {{ __('edit') }}
                        </x-edit-button>


                        <form action="{{ route('koleksi.infoKoleksi', $collection) }}">
                            <x-view-button class="ml-4">
                                {{ __('view') }}
                            </x-view-button>
                        </form>


                        <x-hapus-button class="ml-4">
                            {{ __('Hapus') }}
                        </x-hapus-button>
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