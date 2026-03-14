{{--
    Shared partial: harga matrix builder + photo preview
    Used by: admin/produks/create.blade.php and admin/produks/edit.blade.php

    Variables expected:
    - $existingHarga (array|null): current harga matrix for pre-filling
--}}
<script>
    // ── Existing harga from PHP (pre-fill on edit) ─────────────────────────
    const EXISTING_HARGA = @json($existingHarga ?? []);

    // ── Helpers ───────────────────────────────────────────────────────────
    function parseLines(textarea) {
        const raw = textarea.value.trim();
        if (!raw) return [];
        return raw.split('\n').map(l => l.trim()).filter(Boolean);
    }

    function formatRupiah(val) {
        const n = parseInt(val, 10);
        if (!n) return '';
        return n.toLocaleString('id-ID');
    }

    // ── Build the matrix table ─────────────────────────────────────────────
    function rebuildMatrix() {
        const ukurans = parseLines(document.getElementById('ukuran'));
        const bahans = parseLines(document.getElementById('bahan'));
        const wrapper = document.getElementById('harga-matrix');

        // Neither set → flat price
        if (ukurans.length === 0 && bahans.length === 0) {
            const flatVal = EXISTING_HARGA?.['__flat__']?.['__flat__'] ?? '';
            wrapper.innerHTML = `
                <div class="p-4">
                    <p class="text-sm text-gray-600 mb-2">Tidak ada ukuran/bahan — masukkan harga satuan flat:</p>
                    <input type="number" name="harga[__flat__][__flat__]"
                        value="${flatVal}"
                        placeholder="Contoh: 50000"
                        class="w-48 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:outline-none">
                    <span class="ml-2 text-xs text-gray-400">Rp per pcs</span>
                </div>`;
            return;
        }

        // Only ukuran, no bahan
        if (ukurans.length > 0 && bahans.length === 0) {
            let rows = '';
            ukurans.forEach(uk => {
                const val = EXISTING_HARGA?.[uk]?.['__flat__'] ?? '';
                rows += `<tr class="border-b border-gray-100 last:border-0">
                    <td class="px-4 py-2.5 text-sm text-gray-700 whitespace-nowrap bg-gray-50 font-medium">${escHtml(uk)}</td>
                    <td class="px-4 py-2.5">
                        <input type="number" name="harga[${escAttr(uk)}][__flat__]"
                            value="${val}" placeholder="0" min="0"
                            class="w-36 px-2.5 py-1.5 text-sm border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-300 focus:outline-none">
                        <span class="ml-1 text-xs text-gray-400">Rp/pcs</span>
                    </td>
                </tr>`;
            });
            wrapper.innerHTML =
                `<table class="w-full text-sm"><thead><tr class="text-xs text-gray-500 uppercase bg-gray-50 border-b"><th class="px-4 py-2.5 text-left">Ukuran</th><th class="px-4 py-2.5 text-left">Harga</th></tr></thead><tbody>${rows}</tbody></table>`;
            return;
        }

        // Only bahan, no ukuran
        if (ukurans.length === 0 && bahans.length > 0) {
            let rows = '';
            bahans.forEach(bh => {
                const val = EXISTING_HARGA?.['__flat__']?.[bh] ?? '';
                rows += `<tr class="border-b border-gray-100 last:border-0">
                    <td class="px-4 py-2.5 text-sm text-gray-700 whitespace-nowrap bg-gray-50 font-medium">${escHtml(bh)}</td>
                    <td class="px-4 py-2.5">
                        <input type="number" name="harga[__flat__][${escAttr(bh)}]"
                            value="${val}" placeholder="0" min="0"
                            class="w-36 px-2.5 py-1.5 text-sm border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-300 focus:outline-none">
                        <span class="ml-1 text-xs text-gray-400">Rp/pcs</span>
                    </td>
                </tr>`;
            });
            wrapper.innerHTML =
                `<table class="w-full text-sm"><thead><tr class="text-xs text-gray-500 uppercase bg-gray-50 border-b"><th class="px-4 py-2.5 text-left">Bahan</th><th class="px-4 py-2.5 text-left">Harga</th></tr></thead><tbody>${rows}</tbody></table>`;
            return;
        }

        // Both ukuran AND bahan → full matrix
        let headerCols = bahans.map(bh =>
            `<th class="px-4 py-2.5 text-center whitespace-nowrap text-xs font-medium text-gray-600">${escHtml(bh)}</th>`
            ).join('');
        let rows = '';
        ukurans.forEach(uk => {
            let cells = bahans.map(bh => {
                const val = EXISTING_HARGA?.[uk]?.[bh] ?? '';
                return `<td class="px-3 py-2">
                    <input type="number" name="harga[${escAttr(uk)}][${escAttr(bh)}]"
                        value="${val}" placeholder="0" min="0"
                        class="w-28 px-2.5 py-1.5 text-sm border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-300 focus:outline-none text-center">
                </td>`;
            }).join('');
            rows += `<tr class="border-b border-gray-100 last:border-0 hover:bg-blue-50/30 transition-colors">
                <td class="px-4 py-2.5 text-sm font-medium text-gray-700 whitespace-nowrap bg-gray-50 sticky left-0">${escHtml(uk)}</td>
                ${cells}
            </tr>`;
        });

        wrapper.innerHTML = `
            <table class="w-full text-sm min-w-max">
                <thead class="bg-gray-50 border-b border-gray-200 text-xs text-gray-500 uppercase">
                    <tr>
                        <th class="px-4 py-2.5 text-left bg-gray-50 sticky left-0">Ukuran \\ Bahan</th>
                        ${headerCols}
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">${rows}</tbody>
            </table>
            <p class="text-xs text-gray-400 text-right px-4 py-2">Semua harga dalam Rupiah per pcs</p>`;
    }

    // ── Escape helpers ────────────────────────────────────────────────────
    function escHtml(str) {
        return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }

    function escAttr(str) {
        return str.replace(/"/g, '&quot;').replace(/\[/g, '&#91;').replace(/\]/g, '&#93;');
    }

    // ── Photo preview ─────────────────────────────────────────────────────
    function previewImage(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = (e) => {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('preview-name').textContent = file.name;
            document.getElementById('upload-placeholder').classList.add('hidden');
            document.getElementById('image-preview').classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }

    // ── Init on page load ─────────────────────────────────────────────────
    document.addEventListener('DOMContentLoaded', () => {
        rebuildMatrix();

        // Re-trigger after a short delay to handle browser autofill
        setTimeout(rebuildMatrix, 100);
    });
</script>
