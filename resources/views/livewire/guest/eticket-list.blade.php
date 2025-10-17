<div>
    <h1 class="text-xl font-semibold mb-4 text-white text-center">
        List e-Ticket ( {{ $team->name }} )
    </h1>

    <!-- Tabel tetap tampil, hanya row yang akan diberi animasi -->
    <table class="min-w-full bg-white/0 rounded-lg" id="ticket-table">
        <thead>
            <tr class="bg-blue-800 text-white text-left">
                <th class="p-2 rounded-tl-2xl">Date</th>
                <th class="p-2">Code</th>
                <th class="p-2">Sub Category</th>
                <th class="p-2">User</th>
                <th class="p-2">Agent</th>
                <th class="p-2">Priority</th>
                <th class="p-2">BU</th>
                <th class="p-2">Location</th>
                <th class="p-2 rounded-tr-2xl">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr class="border-b text-white ticket-row" style="visibility: hidden;">
                    <td class="p-2">
                        {{ \Carbon\Carbon::parse($ticket->tanggal)->locale('en')->isoFormat('ddd, D MMM YY') ?? '-' }}
                    </td>
                    <td class="p-2">{{ $ticket->code ?? '-' }} </td>
                    <td class="p-2">{{ $ticket->sub_katagoriAllTeams->sub_kategori ?? '-' }}</td>
                    <td class="p-2">{{ $ticket->user->name ?? '-' }}</td>
                    <td class="p-2">{{ $ticket->agent->name ?? '-' }}</td>
                    <td class="p-2">
                        <span
                            class="px-2 py-1 rounded text-white
                            {{ $ticket->prioritas == 'low'
                                ? 'bg-green-500'
                                : ($ticket->prioritas == 'normal'
                                    ? 'bg-blue-500'
                                    : ($ticket->prioritas == 'high'
                                        ? 'bg-yellow-500'
                                        : 'bg-red-500')) }} ">
                            {{ ucfirst($ticket->prioritas) }}
                        </span>
                    </td>
                    <td class="p-2">{{ ucfirst($ticket->bu) }}</td>
                    <td class="p-2">{{ ucfirst($ticket->lokasiAllTeams->lokasi ?? '-') }}</td>
                    <td class="p-2">
                        <span
                            class="px-2 py-1 rounded text-white text-bold
                            {{ [
                                'Open' => 'bg-yellow-500',
                                'On Progress' => 'bg-blue-500',
                                'Awaiting Response' => 'bg-orange-500',
                                'Repair' => 'bg-gray-500',
                            ][$ticket->status] ?? 'bg-gray-500' }} " style="font-weight: bold;">
                            {{ $ticket->status }}

                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        // Fungsi untuk menambahkan animasi secara bertahap pada setiap baris
        function addAnimation() {
            const rows = document.querySelectorAll('.ticket-row');
            rows.forEach((row, index) => {
                // Menambahkan animasi fadeIn dengan delay yang bertahap
                setTimeout(() => {
                    row.classList.add('animate__animated', 'animate__fadeIn');
                    row.style.visibility = 'visible'; // Tampilkan baris yang disembunyikan sebelumnya
                }, index * 200); // Setiap baris muncul dengan delay 200ms
            });
        }

        // Menambahkan event listener Livewire
        document.addEventListener('livewire:load', () => {
            // Menunda animasi sedikit agar data selesai dimuat terlebih dahulu
            setTimeout(() => {
                addAnimation(); // Menambahkan animasi setelah data dimuat
            }, 500); // Delay 500ms setelah Livewire selesai memuat data
        });

        document.addEventListener('livewire:update', () => {
            // Menunda animasi sedikit setelah Livewire memperbarui data
            setTimeout(() => {
                addAnimation(); // Menambahkan animasi setelah data diperbarui
            }, 500); // Delay 500ms setelah update
        });

        setInterval(() => {
            @this.call('nextPageAuto');
        }, 20000);
    </script>
</div>
