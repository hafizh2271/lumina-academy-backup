<x-app-layout>
    <div class="py-12 bg-[#0b1120] min-h-screen text-white">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <h2 class="text-3xl font-black tracking-tighter uppercase italic">
                    Upload <span class="text-purple-400">Learning Module</span>
                </h2>
                <p class="text-gray-500 text-[10px] font-bold tracking-[0.3em]">PUSAT UNGGAH MATERI GURU</p>
            </div>

            <div class="glass p-8 rounded-[2.5rem] border border-white/10 shadow-2xl relative overflow-hidden">
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-purple-500/10 blur-3xl rounded-full"></div>

                <form action="{{ route('teacher.materials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 relative z-10">
                    @csrf
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-cyan-400 mb-2">Judul Materi</label>
                        <input type="text" name="title" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm focus:border-cyan-500 focus:ring-0 transition-all text-white">
                    </div>

                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-cyan-400 mb-2">Mata Pelajaran</label>
                        <select name="subject" class="w-full bg-[#0f172a] border border-white/10 rounded-xl px-4 py-3 text-sm focus:border-cyan-500 focus:ring-0 text-white">
                            <option value="Dasar-Dasar Mekanika Kuantum">Dasar-Dasar Mekanika Kuantum</option>
                            <option value="Keamanan Siber Tingkat Lanjut">Keamanan Siber Tingkat Lanjut</option>
                            <option value="Kecerdasan Buatan">Kecerdasan Buatan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-cyan-400 mb-2">File Modul (PDF/ZIP)</label>
                        <div class="group relative" id="drop-area">
                            <input type="file" name="file" id="file-input" required class="w-full opacity-0 absolute inset-0 cursor-pointer z-20">
                            
                            <div id="file-box" class="w-full bg-white/5 border-2 border-dashed border-white/10 rounded-2xl p-8 text-center group-hover:border-cyan-500/50 transition-all">
                                <span id="file-text" class="text-xs text-gray-500 font-bold uppercase tracking-widest group-hover:text-cyan-400 transition-colors">
                                    Pilih file atau seret ke sini
                                </span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-cyan-500 to-purple-600 p-4 rounded-2xl font-black uppercase tracking-[0.2em] text-xs shadow-[0_0_30px_rgba(34,211,238,0.2)] hover:scale-[1.02] transition-all active:scale-95">
                        Inisialisasi Upload
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('file-input');
            const fileText = document.getElementById('file-text');
            const fileBox = document.getElementById('file-box');

            fileInput.addEventListener('change', function() {
                if (this.files && this.files.length > 0) {
                    const fileName = this.files[0].name;
                    const fileSize = (this.files[0].size / 1024 / 1024).toFixed(2); // Ukuran dalam MB

                    // Ubah tampilan teks menjadi nama file
                    fileText.innerHTML = `FILE TERDETEKSI: <span class="text-white">${fileName}</span> (${fileSize} MB)`;
                    
                    // Tambahkan style visual kalau file sudah masuk
                    fileText.classList.remove('text-gray-500');
                    fileText.classList.add('text-cyan-400');
                    fileBox.classList.remove('border-white/10');
                    fileBox.classList.add('border-cyan-500', 'bg-cyan-500/5');
                } else {
                    // Reset jika batal pilih
                    fileText.innerText = 'Pilih file atau seret ke sini';
                    fileText.classList.add('text-gray-500');
                    fileText.classList.remove('text-cyan-400');
                    fileBox.classList.add('border-white/10');
                    fileBox.classList.remove('border-cyan-500', 'bg-cyan-500/5');
                }
            });

            // Efek tambahan saat file diseret di atas area (Drag Over)
            fileInput.addEventListener('dragover', () => {
                fileBox.classList.add('border-purple-500', 'scale-[0.99]');
            });

            fileInput.addEventListener('dragleave', () => {
                fileBox.classList.remove('border-purple-500', 'scale-[0.99]');
            });

            fileInput.addEventListener('drop', () => {
                fileBox.classList.remove('border-purple-500', 'scale-[0.99]');
            });
        });
    </script>
</x-app-layout>