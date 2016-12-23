116 105 102 111 115 105 108 105 110 117 120 46 119 111 114 100 112 114 101 115 115 46 99 111 109


# hary-project <tifosilinux.wordpress.com>
- Petunjuk Penggunaan/ HOW TO/ Guidance
- Semua kode sumber bebas di gunakan
- Kode sumber sangat powerfull karena mekanisme hit di proses secara background didalam environment linux. Karena web service atau aplikasi semacam php memiliki limitasi timeout
- Kode sumber dapat ditingkatkan karena masih memiliki kelemahan dimana traffic belum dapat terhitung ke google analytic (script js/ javascript)

- Gunakan direktori regresilinier di dalam phpscript sebagai kode sumber
- Gunakan berkas-berkas di dalam direktori shellscript untuk di daftarkan pada cronjob dengan aturan sbb:
*/1 * * * *     generate_links.sh
* * * * *       switch.sh
9 14,23 * * *   warehouse.sh
1 */[custom] * * *      hit_cron.sh

# hary-project <tifosilinux.wordpress.com>
