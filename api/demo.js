// Mode demo untuk Vercel: pengganti get/save/update/delete_data.php tanpa MySQL.
// Data disimpan di memori dan kembali ke data awal sewaktu-waktu.

let pengguna = [
  { id: 1, nama: 'Andi', kota: 'Bogor' },
  { id: 2, nama: 'Budi', kota: 'Depok' },
  { id: 3, nama: 'Citra', kota: 'Jakarta' },
];
let nextId = 4;
const MAX_ROWS = 50;

// Halaman menampilkan data lewat innerHTML, jadi karakter HTML dibuang agar
// pengunjung tidak bisa menyisipkan script ke browser pengunjung lain.
const clean = (s) => String(s ?? '').replace(/[<>"'`&\\]/g, '').trim().slice(0, 40);

async function readJson(req) {
  if (req.body && typeof req.body === 'object') return req.body;
  const chunks = [];
  for await (const c of req) chunks.push(c);
  try { return JSON.parse(Buffer.concat(chunks).toString() || '{}'); } catch { return {}; }
}

module.exports = async (req, res) => {
  const op = new URL(req.url, 'http://x').searchParams.get('op');
  const send = (code, body) => { res.statusCode = code; res.setHeader('Content-Type', 'application/json'); res.end(JSON.stringify(body)); };

  if (op === 'get') return send(200, pengguna);

  const data = await readJson(req);
  if (op === 'save') {
    const nama = clean(data.nama), kota = clean(data.kota);
    if (!nama || !kota) return send(400, { error: 'Nama dan kota wajib diisi' });
    if (pengguna.length >= MAX_ROWS) pengguna.shift();
    pengguna.push({ id: nextId++, nama, kota });
    return send(200, { ok: true });
  }
  if (op === 'update') {
    const row = pengguna.find((p) => p.id === Number(data.id));
    if (!row) return send(404, { error: 'Data tidak ditemukan' });
    const nama = clean(data.nama), kota = clean(data.kota);
    if (nama) row.nama = nama;
    if (kota) row.kota = kota;
    return send(200, { ok: true });
  }
  if (op === 'delete') {
    pengguna = pengguna.filter((p) => p.id !== Number(data.id));
    return send(200, { ok: true });
  }
  return send(404, { error: 'Not found' });
};
