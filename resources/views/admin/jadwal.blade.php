@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<style>
    /* Menghilangkan scroll utama aplikasi dan memastikan FullCalendar mengisi ruang */
    .fc { height: 100% !important; }
    .fc-scroller { overflow-y: auto !important; }
    
    /* Mencegah tabrakan antara kalender dan container */
    #calendar { min-height: 0; }
</style>

<div class="flex flex-col h-[calc(100vh-100px)] overflow-hidden">
    
    <div class="flex justify-between items-center mb-4 flex-none">
        <h2 class="text-2xl font-bold">Jadwal Booking Studio</h2>
        <span class="text-sm text-gray-500">Mode Admin</span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 flex-grow min-h-0">
        <div class="lg:col-span-2 bg-white p-4 shadow rounded flex flex-col min-h-0">
            <div id="calendar" class="flex-grow"></div>
        </div>

        <div class="bg-white p-6 shadow rounded flex flex-col min-h-0">
            <h3 class="font-bold mb-4 border-b pb-2 flex-none">Detail Timeline</h3>
            
            <div id="timeline-container" class="overflow-y-auto flex-grow pr-2 custom-scrollbar">
                <p class="text-gray-500 italic text-sm text-center mt-10">Pilih tanggal pada kalender.</p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const timelineEl = document.getElementById('timeline-container');
    const jamList = ['08:00', '10:00', '13:00', '16:00', '18:00'];

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        // Tambahkan 'timeGridWeek' untuk tampilan mingguan
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek' 
        },
        buttonText: {
            today: 'Hari ini',
            month: 'Bulan',
            week: 'Minggu'
        },
        events: '/jadwal-calendar',
        height: '100%',
        selectable: true,
        dateClick: function(info) {
            fetchTimeline(info.dateStr);
        }
    });

    calendar.render();

    function fetchTimeline(date) {
        timelineEl.innerHTML = '<p class="text-blue-500 animate-pulse text-center mt-10 text-sm">Mengecek slot...</p>';
        
        fetch(`/jadwal-timeline/${date}`)
            .then(res => res.json())
            .then(data => renderTimeline(data, date))
            .catch(err => {
                timelineEl.innerHTML = '<p class="text-red-500 text-sm text-center mt-10 font-medium">Gagal memuat data jadwal.</p>';
            });
    }

    function renderTimeline(bookedSlots, selectedDate) {
        // Format tanggal agar lebih manusiawi
        let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        let dateObj = new Date(selectedDate);
        let formattedDate = dateObj.toLocaleDateString('id-ID', options);

        let html = `<p class="mb-4 text-[11px] font-bold text-blue-700 bg-blue-50 p-3 rounded-lg uppercase tracking-wider">${formattedDate}</p>`;
        
        jamList.forEach(jam => {
            const isBooked = bookedSlots.find(slot => slot.jam === jam);
            const statusColor = isBooked ? 'text-red-600 bg-red-50 border-red-200' : 'text-emerald-700 bg-emerald-50 border-emerald-200';

            html += `
                <div class="flex justify-between items-center border-b border-gray-100 py-3 px-3 mb-1 rounded-md transition hover:bg-gray-50">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full ${isBooked ? 'bg-red-400' : 'bg-emerald-400'}"></span>
                        <span class="text-gray-700 font-mono font-medium">${jam}</span>
                    </div>
                    <span class="text-[10px] px-2.5 py-1 rounded-full border shadow-sm font-bold ${statusColor}">
                        ${isBooked ? 'TERISI' : 'TERSEDIA'}
                    </span>
                </div>
            `;
        });
        timelineEl.innerHTML = html;
    }
});
</script>

<style>
    /* Styling Scrollbar Tipis */
    .custom-scrollbar::-webkit-scrollbar { width: 5px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #e5e7eb; border-radius: 20px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #d1d5db; }
</style>
@endsection