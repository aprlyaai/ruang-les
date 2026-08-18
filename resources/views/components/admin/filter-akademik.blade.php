@props([
    'actionUrl',
    'filterPackages' => [],
    'filterClasses' => [],
    'filterStudents' => [],
    'filterMentors' => [],
    'resetUrl'
])

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 mb-6">
    <div class="p-5 border-b border-gray-100 bg-gray-50/50">
        <h2 class="text-lg font-bold text-gray-800 flex items-center">
            <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
            Filter Pencarian
        </h2>
    </div>
    <div class="p-5">
        <form action="{{ $actionUrl }}" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4 items-end">
                <div class="lg:col-span-1">
                    <label class="block text-xs font-bold text-gray-700 mb-1">Dari Tanggal</label>
                    <input type="date" name="start_date" value="{{ request('start_date', \Carbon\Carbon::today()->subDays(7)->format('Y-m-d')) }}" max="{{ date('Y-m-d') }}" class="w-full rounded-[1rem] py-[0.75rem] px-4 border border-gray-200 bg-gray-50 text-sm font-medium text-gray-800 shadow-[0_1px_2px_0_rgba(0,0,0,0.05)] focus:bg-white focus:border-[#93c38b] focus:ring-[2px] focus:ring-[#cee6c8] focus:outline-none transition-all duration-150">
                </div>
                <div class="lg:col-span-1">
                    <label class="block text-xs font-bold text-gray-700 mb-1">Sampai Tanggal</label>
                    <input type="date" name="end_date" value="{{ request('end_date', \Carbon\Carbon::today()->format('Y-m-d')) }}" max="{{ date('Y-m-d') }}" class="w-full rounded-[1rem] py-[0.75rem] px-4 border border-gray-200 bg-gray-50 text-sm font-medium text-gray-800 shadow-[0_1px_2px_0_rgba(0,0,0,0.05)] focus:bg-white focus:border-[#93c38b] focus:ring-[2px] focus:ring-[#cee6c8] focus:outline-none transition-all duration-150">
                </div>

                <div class="lg:col-span-1">
                    <label class="block text-xs font-bold text-gray-700 mb-1">Paket Program</label>
                    <select name="program_id" data-placeholder="Semua Paket" class="searchable-select w-full text-sm text-gray-700">
                        <option value="">Semua Paket</option>
                        @foreach($filterPackages as $fp)
                            <option value="{{ $fp->id }}" {{ request('program_id') == $fp->id ? 'selected' : '' }}>{{ $fp->nama_program }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="lg:col-span-1">
                    <label class="block text-xs font-bold text-gray-700 mb-1">Jadwal Kelas</label>
                    <select name="jadwal_id" data-placeholder="Semua Kelas" class="searchable-select w-full text-sm text-gray-700">
                        <option value="">Semua Kelas</option>
                        @foreach($filterClasses as $fc)
                            <option value="{{ $fc->id }}" {{ request('jadwal_id') == $fc->id ? 'selected' : '' }}>{{ $fc->dropdown_text }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="lg:col-span-1">
                    <label class="block text-xs font-bold text-gray-700 mb-1">Murid</label>
                    <select name="murid_id" data-placeholder="Semua Murid" class="searchable-select w-full text-sm text-gray-700">
                        <option value="">Semua Murid</option>
                        @foreach($filterStudents as $fs)
                            <option value="{{ $fs->id }}" {{ request('murid_id') == $fs->id ? 'selected' : '' }}>{{ $fs->nama_murid }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="lg:col-span-1">
                    <label class="block text-xs font-bold text-gray-700 mb-1">Mentor</label>
                    <select name="mentor_id" data-placeholder="Semua Mentor" class="searchable-select w-full text-sm text-gray-700">
                        <option value="">Semua Mentor</option>
                        @foreach($filterMentors as $fm)
                            <option value="{{ $fm->id }}" {{ request('mentor_id') == $fm->id ? 'selected' : '' }}>{{ $fm->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-4 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
                <a href="{{ $resetUrl }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-xl hover:bg-gray-100 focus:outline-none">
                    Reset Filter
                </a>
                <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white transition-all duration-100 bg-primary-600 border border-transparent rounded-xl hover:bg-primary-700 shadow-sm focus:outline-none">
                    Terapkan Filter
                </button>
            </div>
        </form>
    </div>
</div>
